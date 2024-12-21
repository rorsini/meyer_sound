<?php

namespace App\DataFixtures;

use App\Entity\Product;
use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $categories = array('acoustic', 'cine-studio', 'create', 'even', 'lf', 'line-array', 'noseries', 'point-source', 'power');

        foreach($categories as $cat) {
            $category = new Category();
            $category->setName($cat);
            $manager->persist($category);
        }

        $ms_products = array(
            array('750-LFC', 'Very Compact Low-Frequency Control Element', 'https://3ca9a566.delivery.rocketcdn.me/wp-content/uploads/2017/03/750-lfc_1600x900.jpg', 'https://meyersound.com/product/750-lfc/', 'https://docs.meyersound.com/products/en/750-lfc.html'), array( '900-LFC', 'Compact Low-Frequency Control Element', 'https://3ca9a566.delivery.rocketcdn.me/wp-content/uploads/2017/01/900-lfc_full.jpg', 'https://meyersound.com/product/900-lfc/', 'https://docs.meyersound.com/products/en/900-lfc.html'),
            array('Acheron', 'Screen Channel Loudspeaker', 'https://3ca9a566.delivery.rocketcdn.me/wp-content/uploads/2017/01/acheron_80_full.jpg', 'https://meyersound.com/product/acheron/', 'https://docs.meyersound.com/products/en/acheron.html'),
            array('Amie Systems', 'Scalable Studio Monitor System', 'https://3ca9a566.delivery.rocketcdn.me/wp-content/uploads/2021/01/amie_systems_full.jpg', 'https://meyersound.com/product/amie-systems/', 'https://docs.meyersound.com/products/en/amie-systems.html'),
            array('Ashby', 'Ceiling Loudspeaker', 'https://3ca9a566.delivery.rocketcdn.me/wp-content/uploads/2017/06/180702_ashby_full.jpg', 'https://meyersound.com/product/ashby/', 'https://docs.meyersound.com/products/en/ashby.html'),
            array('Bluehorn System', 'Full Bandwidth Monitoring', 'https://3ca9a566.delivery.rocketcdn.me/wp-content/uploads/2017/09/bluehorn_full.jpg', 'https://meyersound.com/product/bluehorn-system/', 'https://docs.meyersound.com/products/en/bluehorn-system.html'),
            array('Compass', 'Control Software', 'https://3ca9a566.delivery.rocketcdn.me/wp-content/uploads/2017/01/compass_full.jpg', 'https://meyersound.com/product/compass/', ''),
            array('Compass Go', 'Control Software iPad App', 'https://3ca9a566.delivery.rocketcdn.me/wp-content/uploads/2017/01/compass_go_full.jpg', 'https://meyersound.com/product/compass-go/', 'https://docs.meyersound.com/products/en/compass-go.html'),
            array('Constellation', 'Acoustic System', '', 'https://meyersound.com/product/constellation/', 'https://docs.meyersound.com/products/en/constellation.html'),
            array('CueStation', 'Control Software', 'https://3ca9a566.delivery.rocketcdn.me/wp-content/uploads/2017/08/cuestation_full.jpg', 'https://meyersound.com/product/cuestation/', 'https://docs.meyersound.com/products/en/cuestation.html'),
            array('Galileo GALAXY', 'Network Platform', 'https://3ca9a566.delivery.rocketcdn.me/wp-content/uploads/2016/10/211124_1600x900_full_image.jpg', 'https://meyersound.com/product/galileo-galaxy/', 'https://docs.meyersound.com/products/en/galileo-galaxy.html'),
            array('HMS', 'Cinema Surround Loudspeaker', 'https://3ca9a566.delivery.rocketcdn.me/wp-content/uploads/2017/01/hms-10_full.jpg', 'https://meyersound.com/product/hms/', 'https://docs.meyersound.com/products/en/hms.html'),
            array('LEOPARD', 'Compact Linear Line Array Loudspeaker', 'https://3ca9a566.delivery.rocketcdn.me/wp-content/uploads/2017/01/leopard_full.jpg', 'https://meyersound.com/product/leopard/', 'https://docs.meyersound.com/products/en/leopard.html'),
            array('Libra', 'Acoustic Image System', 'https://3ca9a566.delivery.rocketcdn.me/wp-content/uploads/2017/01/libra_full.jpg', 'https://meyersound.com/product/libra/', 'https://docs.meyersound.com/products/en/libra.html'),
            array('LINA', 'Very Compact Linear Line Array Loudspeaker', 'https://3ca9a566.delivery.rocketcdn.me/wp-content/uploads/2017/03/lina_1600x900.jpg', 'https://meyersound.com/product/lina/', 'https://docs.meyersound.com/products/en/lina.html'),
            array('MAPP 3D', 'System Design and Prediction Tool', '', 'https://meyersound.com/product/mapp-3d/', 'https://docs.meyersound.com/products/en/mapp-3d.html'),
            array('MAPP XT', 'System Design Tool', '', 'https://meyersound.com/product/mapp-xt/', ''),
            array('MJF', 'High-Power Stage Monitors', 'https://3ca9a566.delivery.rocketcdn.me/wp-content/uploads/2017/01/mjf_full.jpg', 'https://meyersound.com/product/mjf/', 'https://docs.meyersound.com/products/en/mjf.html'),
            array('MM-10', 'Miniature Subwoofers', 'https://3ca9a566.delivery.rocketcdn.me/wp-content/uploads/2017/02/mm-10_full.jpg', 'https://meyersound.com/product/mm-10/', 'https://docs.meyersound.com/products/en/mm-10.html'),
            array('MM-4XP', 'Miniature Self-Powered Loudspeaker', 'https://3ca9a566.delivery.rocketcdn.me/wp-content/uploads/2017/01/mm_full.jpg', 'https://meyersound.com/product/mm-4xp/', 'https://docs.meyersound.com/products/en/mm-4xp.html'),
            array('MPS', 'IntelligentDC Power Supplies', 'https://3ca9a566.delivery.rocketcdn.me/wp-content/uploads/2019/02/mps-488x_full.jpg', 'https://meyersound.com/product/mps/', 'https://docs.meyersound.com/products/en/mps.html'),
            array('NADIA', 'Integrated Digital Audio Platform', '', 'https://meyersound.com/product/nadia/', 'https://docs.meyersound.com/products/en/nadia.html'),
            array('Nebra', 'Software Platform', 'https://3ca9a566.delivery.rocketcdn.me/wp-content/uploads/2022/09/221115_nebra_desktop_1600x900.jpg', 'https://meyersound.com/product/nebra/', 'https://docs.meyersound.com/products/en/nebra.html'),
            array('PANTHER', 'Large-Format Linear Line Array Loudspeaker', 'https://3ca9a566.delivery.rocketcdn.me/wp-content/uploads/2022/01/panther_full.jpg', 'https://meyersound.com/product/panther/', 'https://docs.meyersound.com/products/en/panther.html'),
            array('Residential Solutions', 'Home Cinema and Distributed Audio', '', 'https://meyersound.com/product/residential-solutions/', 'https://docs.meyersound.com/products/en/cine-studio.html'),
            array('Spacemap Go', 'Spatial Sound Design and Mixing Tool', '', 'https://meyersound.com/product/spacemap-go/', 'https://docs.meyersound.com/products/en/spacemap-go.html'),
            array('Ultra Reflex', 'Screen Channel Sound for Direct View Displays', '', 'https://meyersound.com/product/ultra-reflex/', 'https://docs.meyersound.com/products/en/ultra-reflex.html'),
            array('ULTRA-X20', 'Compact Point Source Loudspeaker', 'https://3ca9a566.delivery.rocketcdn.me/wp-content/uploads/2020/02/ultra-x20_full.jpg', 'https://meyersound.com/product/ultra-x20/', 'https://docs.meyersound.com/products/en/ultra-x20.html'),
            array('ULTRA-X40', 'Compact Point Source Loudspeaker', 'https://3ca9a566.delivery.rocketcdn.me/wp-content/uploads/2019/01/ultra-x40_full.jpg', 'https://meyersound.com/product/ultra-x40/', 'https://docs.meyersound.com/products/en/ultra-x40.html'),
            array('ULTRA-X80', 'Versatile Point Source Loudspeaker', '', 'https://meyersound.com/product/ultra-x80/', 'https://docs.meyersound.com/products/en/ultra-x80.html'),
            array('UP-4slim', 'UltraCompact Installation Loudspeaker ', 'https://3ca9a566.delivery.rocketcdn.me/wp-content/uploads/2018/02/up-4slim_full-1.jpg', 'https://meyersound.com/product/up-4slim/', 'https://docs.meyersound.com/products/en/up-4slim.html'),
            array('UPM', 'UltraCompact Loudspeaker', 'https://3ca9a566.delivery.rocketcdn.me/wp-content/uploads/2017/01/upm_full.jpg', 'https://meyersound.com/product/upm/', 'https://docs.meyersound.com/products/en/upm.html'),
            array('UPQ', 'Full-Size Loudspeaker', 'https://3ca9a566.delivery.rocketcdn.me/wp-content/uploads/2019/02/upq-d1_full.jpg', 'https://meyersound.com/product/upq/', 'https://docs.meyersound.com/products/en/upq.html'),
            array('USW-112P', 'Compact Subwoofers', 'https://3ca9a566.delivery.rocketcdn.me/wp-content/uploads/2020/02/usw-112p_full.jpg', 'https://meyersound.com/product/usw-112p/', 'https://docs.meyersound.com/products/en/usw-112p.html'),
            array('USW-210P', 'Compact Narrow Subwoofer', 'https://3ca9a566.delivery.rocketcdn.me/wp-content/uploads/2018/10/usw-210p_full.jpg', 'https://meyersound.com/product/usw-210p/', 'https://docs.meyersound.com/products/en/usw-210p.html'),
            array('VLFC', 'Very Low Frequency Control Element', 'https://3ca9a566.delivery.rocketcdn.me/wp-content/uploads/2017/06/vlfc_full.jpg', 'https://meyersound.com/product/vlfc/', 'https://docs.meyersound.com/products/en/vlfc.html'),
            array('X-1100C', 'High&#x2010;Power Cinema Subwoofer', 'https://3ca9a566.delivery.rocketcdn.me/wp-content/uploads/2021/04/x-1100c_full.jpg', 'https://meyersound.com/product/x-1100c/', 'https://docs.meyersound.com/products/en/x-1100c.html'),
            array('X-400C', 'Compact Cinema Subwoofer', 'https://3ca9a566.delivery.rocketcdn.me/wp-content/uploads/2017/01/x-400c_full.jpg', 'https://meyersound.com/product/x-400c/', 'https://docs.meyersound.com/products/en/x-400c.html'),
            array('X-800C', 'High-Power Cinema Subwoofer', 'https://3ca9a566.delivery.rocketcdn.me/wp-content/uploads/2019/07/x-800c_full.jpg', 'https://meyersound.com/product/x-800c/', 'https://docs.meyersound.com/products/en/x-800c.html'),
        );

        foreach($ms_products as $item) {
            $product = new Product();
            $product->setCode($item[0]);
            $product->setDescription($item[1]);
            $product->setImageUrl($item[2]);
            $product->setProductUrl($item[3]);
            $product->setResourceUrl($item[4]);
            $manager->persist($product);
        }

        $manager->flush();
    }
}
