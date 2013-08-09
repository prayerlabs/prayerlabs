<?php
namespace Prayerlabs\MyprofileBundle\Twig;
use Prayerlabs\MyprofileBundle\CustomClass\Utility;

class MyExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('dateDiffFromNow', array($this, 'dateFilter')),
        );
    }

    public function dateFilter($date)
    {
       return Utility::calculateDateDifference(date('r'), $date->format('r'));
    }

    public function getName()
    {
        return 'my_extension';
    }
}