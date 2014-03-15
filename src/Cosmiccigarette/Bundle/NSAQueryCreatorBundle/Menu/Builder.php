<?php
/**
 * Created by PhpStorm.
 * User: Holger
 * Date: 09.03.14
 * Time: 21:54
 */

namespace Cosmiccigarette\Bundle\NSAQueryCreatorBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware {
    public function mainMenu(FactoryInterface $factory, array $options) {
        $menu = $factory->createItem('root');

        $menu->setChildrenAttributes(array('class' => 'nav navbar-nav'));
        $menu->setCurrentUri($this->container->get('request')->getRequestUri());
        $menu->addChild('Home', array('route' => 'nsa_query_creator_homepage'));
        $menu->addChild('Add new keyword', array('route' => 'nsa_query_creator_add_query'));
        $menu->addChild('All queries', array('route' => 'nsa_query_creator_show_all_queries'));
        $menu->addChild('About', array('route' => 'nsa_query_creator_learn_more'));
        $menu->setCurrent(true);

        return $menu;
    }
}
