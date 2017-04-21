<?php
/**
 * Created by PhpStorm.
 * User: Numerah
 * Date: 5/6/14
 * Time: 12:15 PM
 */

namespace apb\appassBundle\Controller;

use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use apb\appassBundle\Entity\User;
use apb\appassBundle\Entity\mgeneral;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\FOSRestController;

class UserRestController extends FOSRestController
{
    public function getUserAction($username)
    {

        if($username == 'list')

        {
        /*$clientManager = $this->getContainer()->get('fos_oauth_server.client_manager.default');
        $client = $clientManager->createClient();
        $client->setRedirectUris(array('http://localhost/apppassbook/web/app_dev.php/api/users/ameer'));
        $client->setAllowedGrantTypes(array('token', 'authorization_code'));
        $clientManager->updateClient($client); */

            try {
                $query = $this->getDoctrine()->getEntityManager()
                    ->createQuery(
                        'SELECT e.id as ID,e.logoText as Title,e.iconName as Icon,e.couponId as PassID,
                         d.couponPrimaryFieldLabel as Discount,f.organizationDescription as Description,
                         f.passUpgradeDate as Updated ,f.places as Category,f.organizationName as Company ,
                         e.logoName as CompanyLogo,
                         g.couponRelevanceLocationTotalFields as total,
                          g.couponRelevanceLocationAddressOne as Location1,
                          g.couponRelevanceLocationAddressOneLatitude as Latitude1,
                          g.couponRelevanceLocationAddressOneLongitude as Longitude1,
                          g.couponRelevanceLocationAddressTwo as Location2,
                          g.couponRelevanceLocationAddressTwoLatitude as Latitude2,
                          g.couponRelevanceLocationAddressTwoLongitude as Longitude2,
                          g.couponRelevanceLocationAddressThree as Location3,
                          g.couponRelevanceLocationAddressThreeLatitude as Latitude3,
                          g.couponRelevanceLocationAddressThreeLongitude as Longitude3,
                          g.couponRelevanceLocationAddressFour as Location4,
                          g.couponRelevanceLocationAddressFourLatitude as Latitude4,
                          g.couponRelevanceLocationAddressFourLongitude as Longitude4,
                          g.couponRelevanceLocationAddressFive as Location5,
                          g.couponRelevanceLocationAddressFiveLatitude as Latitude5,
                          g.couponRelevanceLocationAddressFiveLongitude as Longitude5,
                          g.couponRelevanceLocationAddressSix as Location6,
                          g.couponRelevanceLocationAddressSixLatitude as Latitude6,
                          g.couponRelevanceLocationAddressSixLongitude as Longitude6,
                          g.couponRelevanceLocationAddressSeven as Location7,
                          g.couponRelevanceLocationAddressSevenLatitude as Latitude7,
                          g.couponRelevanceLocationAddressSevenLongitude as Longitude7,
                          g.couponRelevanceLocationAddressEight as Location8,
                          g.couponRelevanceLocationAddressEightLatitude as Latitude8,
                          g.couponRelevanceLocationAddressEightLongitude as Longitude8,
                          g.couponRelevanceLocationAddressNine as Location9,
                          g.couponRelevanceLocationAddressNineLatitude as Latitude9,
                          g.couponRelevanceLocationAddressNineLongitude as Longitude9,
                          g.couponRelevanceLocationAddressTen as Location10,
                          g.couponRelevanceLocationAddressTenLatitude as Latitude10,
                          g.couponRelevanceLocationAddressTenLongitude as Longitude10,
                         h.passExpirationDate as Expiration
                         FROM apbappassBundle:mappearance e
                         JOIN apbappassBundle:mprimary d where e.couponId = d.couponId
                         JOIN apbappassBundle:mgeneral f where d.couponId = f.couponId
                         JOIN apbappassBundle:mrelevance g where f.couponId = g.couponId
                         JOIN apbappassBundle:mdistribution h where g.couponId = h.couponId and h.distributionStatus = 1'
                    )->getResult();
                $result = $query;
                $imagedir = 'http://mcoupons.cogilent.net/upload';
                foreach($result as $key => $value)
                {
                    if($result[$key]['Icon']!="")
                    {
                        $result[$key]['Icon'] = $imagedir.'/'.$value['ID'].'/'.$value['Icon'];
                    }
                    if($result[$key]['CompanyLogo']!="")
                    {
                        $result[$key]['CompanyLogo'] = $imagedir.'/'.$value['ID'].'/'.$value['CompanyLogo'];
                    }
                }
                foreach($result as $key => $value)
                {
                    if($result[$key]['Expiration']!="")
                    {
                        $today = date("Y-m-d");
                        $expiry = $result[$key]['Expiration'];
                        $expiryDate = $expiry->format('Y-m-d');

                        if ($today>$expiryDate){

                            unset($result[$key]);

                        }
                        else
                        {

                        }
                    }
                }
                foreach($result as $key => $value)
                {
                    switch($result[$key]['total'])
                    {
                        case 1:
                            $result[$key]['Location2'] = null;
                            $result[$key]['Latitude2'] = null;
                            $result[$key]['Longitude2'] = null;
                            $result[$key]['Location3'] = null;
                            $result[$key]['Latitude3'] = null;
                            $result[$key]['Longitude3'] = null;
                            $result[$key]['Location4'] = null;
                            $result[$key]['Latitude4'] = null;
                            $result[$key]['Longitude4'] = null;
                            $result[$key]['Location5'] = null;
                            $result[$key]['Latitude5'] = null;
                            $result[$key]['Longitude5'] = null;
                            $result[$key]['Location6'] = null;
                            $result[$key]['Latitude6'] = null;
                            $result[$key]['Longitude6'] = null;
                            $result[$key]['Location7'] = null;
                            $result[$key]['Latitude7'] = null;
                            $result[$key]['Longitude7'] = null;
                            $result[$key]['Location8'] = null;
                            $result[$key]['Latitude8'] = null;
                            $result[$key]['Longitude8'] = null;
                            $result[$key]['Location9'] = null;
                            $result[$key]['Latitude9'] = null;
                            $result[$key]['Longitude9'] = null;
                            $result[$key]['Location10'] = null;
                            $result[$key]['Latitude10'] = null;
                            $result[$key]['Longitude10'] = null;
                            break;
                        case 2:
                            $result[$key]['Location3'] = null;
                            $result[$key]['Latitude3'] = null;
                            $result[$key]['Longitude3'] = null;
                            $result[$key]['Location4'] = null;
                            $result[$key]['Latitude4'] = null;
                            $result[$key]['Longitude4'] = null;
                            $result[$key]['Location5'] = null;
                            $result[$key]['Latitude5'] = null;
                            $result[$key]['Longitude5'] = null;
                            $result[$key]['Location6'] = null;
                            $result[$key]['Latitude6'] = null;
                            $result[$key]['Longitude6'] = null;
                            $result[$key]['Location7'] = null;
                            $result[$key]['Latitude7'] = null;
                            $result[$key]['Longitude7'] = null;
                            $result[$key]['Location8'] = null;
                            $result[$key]['Latitude8'] = null;
                            $result[$key]['Longitude8'] = null;
                            $result[$key]['Location9'] = null;
                            $result[$key]['Latitude9'] = null;
                            $result[$key]['Longitude9'] = null;
                            $result[$key]['Location10'] = null;
                            $result[$key]['Latitude10'] = null;
                            $result[$key]['Longitude10'] = null;
                            break;
                        case 3:
                            $result[$key]['Location4'] = null;
                            $result[$key]['Latitude4'] = null;
                            $result[$key]['Longitude4'] = null;
                            $result[$key]['Location5'] = null;
                            $result[$key]['Latitude5'] = null;
                            $result[$key]['Longitude5'] = null;
                            $result[$key]['Location6'] = null;
                            $result[$key]['Latitude6'] = null;
                            $result[$key]['Longitude6'] = null;
                            $result[$key]['Location7'] = null;
                            $result[$key]['Latitude7'] = null;
                            $result[$key]['Longitude7'] = null;
                            $result[$key]['Location8'] = null;
                            $result[$key]['Latitude8'] = null;
                            $result[$key]['Longitude8'] = null;
                            $result[$key]['Location9'] = null;
                            $result[$key]['Latitude9'] = null;
                            $result[$key]['Longitude9'] = null;
                            $result[$key]['Location10'] = null;
                            $result[$key]['Latitude10'] = null;
                            $result[$key]['Longitude10'] = null;
                            break;
                        case 4:
                            $result[$key]['Location5'] = null;
                            $result[$key]['Latitude5'] = null;
                            $result[$key]['Longitude5'] = null;
                            $result[$key]['Location6'] = null;
                            $result[$key]['Latitude6'] = null;
                            $result[$key]['Longitude6'] = null;
                            $result[$key]['Location7'] = null;
                            $result[$key]['Latitude7'] = null;
                            $result[$key]['Longitude7'] = null;
                            $result[$key]['Location8'] = null;
                            $result[$key]['Latitude8'] = null;
                            $result[$key]['Longitude8'] = null;
                            $result[$key]['Location9'] = null;
                            $result[$key]['Latitude9'] = null;
                            $result[$key]['Longitude9'] = null;
                            $result[$key]['Location10'] = null;
                            $result[$key]['Latitude10'] = null;
                            $result[$key]['Longitude10'] = null;
                            break;
                        case 5:
                            $result[$key]['Location6'] = null;
                            $result[$key]['Latitude6'] = null;
                            $result[$key]['Longitude6'] = null;
                            $result[$key]['Location7'] = null;
                            $result[$key]['Latitude7'] = null;
                            $result[$key]['Longitude7'] = null;
                            $result[$key]['Location8'] = null;
                            $result[$key]['Latitude8'] = null;
                            $result[$key]['Longitude8'] = null;
                            $result[$key]['Location9'] = null;
                            $result[$key]['Latitude9'] = null;
                            $result[$key]['Longitude9'] = null;
                            $result[$key]['Location10'] = null;
                            $result[$key]['Latitude10'] = null;
                            $result[$key]['Longitude10'] = null;
                            break;
                        case 6:
                            $result[$key]['Location7'] = null;
                            $result[$key]['Latitude7'] = null;
                            $result[$key]['Longitude7'] = null;
                            $result[$key]['Location8'] = null;
                            $result[$key]['Latitude8'] = null;
                            $result[$key]['Longitude8'] = null;
                            $result[$key]['Location9'] = null;
                            $result[$key]['Latitude9'] = null;
                            $result[$key]['Longitude9'] = null;
                            $result[$key]['Location10'] = null;
                            $result[$key]['Latitude10'] = null;
                            $result[$key]['Longitude10'] = null;
                            break;
                        case 7:
                            $result[$key]['Location8'] = null;
                            $result[$key]['Latitude8'] = null;
                            $result[$key]['Longitude8'] = null;
                            $result[$key]['Location9'] = null;
                            $result[$key]['Latitude9'] = null;
                            $result[$key]['Longitude9'] = null;
                            $result[$key]['Location10'] = null;
                            $result[$key]['Latitude10'] = null;
                            $result[$key]['Longitude10'] = null;
                            break;
                        case 8:
                            $result[$key]['Location9'] = null;
                            $result[$key]['Latitude9'] = null;
                            $result[$key]['Longitude9'] = null;
                            $result[$key]['Location10'] = null;
                            $result[$key]['Latitude10'] = null;
                            $result[$key]['Longitude10'] = null;
                            break;
                        case 9:
                            $result[$key]['Location10'] = null;
                            $result[$key]['Latitude10'] = null;
                            $result[$key]['Longitude10'] = null;
                            break;
                        case 10:
                            break;
                    }

                    $result[$key]['total'] = null;
                }
                $result = array_values($result);
            }
            catch (Exception $e) {
                echo 'Caught exception: ',  $e->getMessage(), "\n";
            }
            //return $result;
            $data = $result; // get data, in this case list of users.
            $view = $this->view($data, 200)
            ->setTemplate("apbappassBundle:Default:apitest.html.twig")
            ->setTemplateVar('details');

            return $this->handleView($view);
        }
        else
        {

            $storeArray = Array();
            $storeArray[] = "http://mcoupons.cogilent.net/bundles/apbappass/pkpass/".$username.".pkpass";
            $dir    = $this->get('kernel')->getRootDir() . '/logs/pkpass';//'app/logs/pkpass';
            $files2 = scandir($dir);
            $files1 = array_diff($files2, array('.', '..'));
            $root = $this->get('kernel')->getRootDir();
            $src    = $root.'/logs/pkpass';
            $dst    = '/var/www/html/deploy/apppassbook/src/apb/appassBundle/Resources/public/pkpass';
            //$dst    = '/var/www/html/apppassbook/src/apb/appassBundle/Resources/public/pkpass';
            $dir = opendir($src);
            @mkdir($dst, 0777, true);
            while(false !== ( $file = readdir($dir)) ) {
                if (( $file != '.' ) && ( $file != '..' )) {
                    if ( is_dir($src . '/' . $file) ) {
                        recurse_copy($src . '/' . $file,$dst . '/' . $file);
                    }
                    else {
                        copy($src . '/' . $file,$dst . '/' . $file);
                    }
                }
            }
            closedir($dir);
            return $storeArray;
        }
    }
    public function redirectAction()
    {
        //$view = $this->redirectView($this->generateUrl('some_route'), 301);
        // or
        $view = $this->routeRedirectView('apbappassBundle:Default:index.html.twig', array(), 301);

        return $this->handleView($view);
    }
}