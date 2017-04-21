<?php

namespace apb\appassBundle\Controller;

use apb\appassBundle\Entity\mdistribution;
use apb\appassBundle\Entity\mdynamic;
use apb\appassBundle\Entity\test;
use apb\appassBundle\Form\mdistributionType;
use apb\appassBundle\Form\mdynamicType;
use apb\appassBundle\Form\testType;
use Passbook\Pass\DateField;
use Passbook\Pass\Location;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use apb\appassBundle\Entity\User;
use apb\appassBundle\Entity\mgeneral;
use apb\appassBundle\Entity\mappearance;
use apb\appassBundle\Entity\mdatasetting;
use apb\appassBundle\Entity\mheader;
use apb\appassBundle\Entity\mprimary;
use apb\appassBundle\Entity\msecondary;
use apb\appassBundle\Entity\mauxiliary;
use apb\appassBundle\Entity\mbackfields;
use apb\appassBundle\Entity\mrelevance;
use apb\appassBundle\Form\mgeneralType;
use apb\appassBundle\Form\mappearanceType;
use apb\appassBundle\Form\mdatasettingType;
use apb\appassBundle\Form\mheaderType;
use apb\appassBundle\Form\mprimaryType;
use apb\appassBundle\Form\msecondaryType;
use apb\appassBundle\Form\mauxiliaryType;
use apb\appassBundle\Form\mbackfieldsType;
use apb\appassBundle\Form\mrelevanceType;
use Passbook\Pass\Field;
use Passbook\Pass\Image;
use Passbook\PassFactory;
use Passbook\Pass\Barcode;
use Passbook\Pass\Structure;
use Passbook\Type\EventTicket;
use Passbook\Type\Coupon;
use Passbook\Type\BoardingPass;
use Passbook\Type\Generic;
use Passbook\Type\StoreCard;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
use Doctrine\ORM\Query;

class DefaultController extends Controller
{
    public function indexAction($name)
    {

        return $this->render('apbappassBundle:Default:index.html.twig', array('name' => $name));
    }
    public function apientryAction(Request $request)
    {
        return $this->redirect($this->generateUrl('apb_appass_manage'));
    }
    public function newAction(Request $request)
    {

        $task1 = new mgeneral();
        $task2 = new mappearance();
        $task3 = new mdatasetting();
        $task4 = new mheader();
        $task5 = new mprimary();
        $task6 = new msecondary();
        $task7 = new mauxiliary();
        $task8 = new mbackfields();
        $task9 = new mrelevance();
        $task10 = new mdistribution();

        $passid = sha1(uniqid(mt_rand(),true));
        $task1->setPassKey($passid);
        //$task->setUserId('1');
        //$task->setClientId('1');
        //$task->setDueDate(new \DateTime('tomorrow'));

        $form1 = $this->createForm(new mgeneralType(), $task1);
        $form2 = $this->createForm(new mappearanceType(), $task2);
        $form3 = $this->createForm(new mdatasettingType(), $task3);
        $form4 = $this->createForm(new mheaderType(), $task4);
        $form5 = $this->createForm(new mprimaryType(), $task5);
        $form6 = $this->createForm(new msecondaryType(), $task6);
        $form7 = $this->createForm(new mauxiliaryType(), $task7);
        $form8 = $this->createForm(new mbackfieldsType(), $task8);
        $form9 = $this->createForm(new mrelevanceType(), $task9);
        $form10 = $this->createForm(new mdistributionType(), $task10);

        $generalid = md5(uniqid(mt_rand(),true));
        $root = $this->get('kernel')->getRootDir();
        //$mainicon = $root.'/Resources/Images/mCouponsLogoIcon58x58.png';
        $imagedir = __DIR__ . "/../../../../web/upload/";
        if ($request->isMethod('POST')) {

            $em = $this->getDoctrine()->getManager();
            $form1->bind($request);
            $form2->bind($request);
            $form3->bind($request);
            $form4->bind($request);
            $form5->bind($request);
            $form6->bind($request);
            $form7->bind($request);
            $form8->bind($request);
            $form9->bind($request);
            $form10->bind($request);

            $doptions = $task3->getCouponBarcodeValueSource();
            $gtype = $task3->getCouponAutoGenerateValueType();
            $glength = $task3->getCouponAutoGenerateValueLength();
            $barcodeoption = $task3->getCouponBarcodeValueOption();
            $barcodealttext = $task3->getBarcodeAlternateText();
            $barcodeFixedtext = $task3->getCouponBarcodeFixedValue();
            $barcodeDynamictext= $task3->getCouponBarcodeDynamicValue();
            $barcodealtfixedtext = $task3->getBarcodeAlternateFixedText();
            $barcodealtdynamictext = $task3->getBarcodeAlternateDynamicText();
            $barcodestatus = $task3->getCouponBarcodeStatus();
            $alttext="";
            switch($barcodestatus){
                case "hide":
                    $task3->setCouponAutoGenerateValue("hide");
                    break;

                case "show":
                    switch($barcodeoption){
                        case "Static":
                            $alttext=$barcodeFixedtext;
                            $task3->setCouponAutoGenerateValue($alttext);
                            break;
                        case "Dynamic":
                            switch($doptions)
                            {
                                case "Dynamic":
                                    $alttext=$barcodeDynamictext;
                                    $task3->setCouponAutoGenerateValue($alttext);
                                    break;
                                case "autogen":
                                    switch($gtype){

                                        case "type":
                                            $numvalue = sha1(uniqid(mt_rand(),true));
                                            switch($glength){
                                                case "length":
                                                    break;
                                                case 4:
                                                    $gvalue = substr($numvalue, 0 , 4);
                                                    break;
                                                case 5:
                                                    $gvalue = substr($numvalue, 0 , 5);
                                                    break;
                                                case 6:
                                                    $gvalue = substr($numvalue, 0 , 6);
                                                    break;
                                                case 7:
                                                    $gvalue = substr($numvalue, 0 , 7);
                                                    break;
                                                case 8:
                                                    $gvalue = substr($numvalue, 0 , 8);
                                                    break;
                                                case 9:
                                                    $gvalue = substr($numvalue, 0 , 9);
                                                    break;
                                                case 10:
                                                    $gvalue = substr($numvalue, 0 , 10);
                                                    break;
                                                case 11:
                                                    $gvalue = substr($numvalue, 0 , 11);
                                                    break;
                                                case 12:
                                                    $gvalue = substr($numvalue, 0 , 12);
                                                    break;
                                                case 13:
                                                    $gvalue = substr($numvalue, 0 , 13);
                                                    break;
                                                case 14:
                                                    $gvalue = substr($numvalue, 0 , 14);
                                                    break;
                                                case 15:
                                                    $gvalue = substr($numvalue, 0 , 15);
                                                    break;
                                            }
                                            $task3->setCouponAutoGenerateValue($gvalue);
                                            $alttext=$gvalue;
                                            break;
                                        case "Numeric":
                                            $num1 = rand(100000,999999);
                                            $num2 = rand(100000,999999);
                                            $num3 = rand(100,999);
                                            $numvalue = $num1.$num2.$num3;;
                                            switch($glength){
                                                case "length":
                                                    break;
                                                case 4:
                                                    $gvalue = substr($numvalue, 0 , 4);
                                                    break;
                                                case 5:
                                                    $gvalue = substr($numvalue, 0 , 5);
                                                    break;
                                                case 6:
                                                    $gvalue = substr($numvalue, 0 , 6);
                                                    break;
                                                case 7:
                                                    $gvalue = substr($numvalue, 0 , 7);
                                                    break;
                                                case 8:
                                                    $gvalue = substr($numvalue, 0 , 8);
                                                    break;
                                                case 9:
                                                    $gvalue = substr($numvalue, 0 , 9);
                                                    break;
                                                case 10:
                                                    $gvalue = substr($numvalue, 0 , 10);
                                                    break;
                                                case 11:
                                                    $gvalue = substr($numvalue, 0 , 11);
                                                    break;
                                                case 12:
                                                    $gvalue = substr($numvalue, 0 , 12);
                                                    break;
                                                case 13:
                                                    $gvalue = substr($numvalue, 0 , 13);
                                                    break;
                                                case 14:
                                                    $gvalue = substr($numvalue, 0 , 14);
                                                    break;
                                                case 15:
                                                    $gvalue = substr($numvalue, 0 , 15);
                                                    break;
                                            }
                                            $task3->setCouponAutoGenerateValue($gvalue);
                                            $alttext=$gvalue;
                                            break;
                                        case "Alphabet":
                                            $seed = str_split('abcdefghijklmnopqrstuvwxyz'); // and any other characters
                                            shuffle($seed); // probably optional since array_is randomized; this may be redundant
                                            $rand = '';
                                            foreach (array_rand($seed, 16) as $k)
                                            {
                                                $rand .= $seed[$k];
                                            }

                                            $numvalue = $rand;
                                            switch($glength){
                                                case "length":
                                                    break;
                                                case 4:
                                                    $gvalue = substr($numvalue, 0 , 4);
                                                    break;
                                                case 5:
                                                    $gvalue = substr($numvalue, 0 , 5);
                                                    break;
                                                case 6:
                                                    $gvalue = substr($numvalue, 0 , 6);
                                                    break;
                                                case 7:
                                                    $gvalue = substr($numvalue, 0 , 7);
                                                    break;
                                                case 8:
                                                    $gvalue = substr($numvalue, 0 , 8);
                                                    break;
                                                case 9:
                                                    $gvalue = substr($numvalue, 0 , 9);
                                                    break;
                                                case 10:
                                                    $gvalue = substr($numvalue, 0 , 10);
                                                    break;
                                                case 11:
                                                    $gvalue = substr($numvalue, 0 , 11);
                                                    break;
                                                case 12:
                                                    $gvalue = substr($numvalue, 0 , 12);
                                                    break;
                                                case 13:
                                                    $gvalue = substr($numvalue, 0 , 13);
                                                    break;
                                                case 14:
                                                    $gvalue = substr($numvalue, 0 , 14);
                                                    break;
                                                case 15:
                                                    $gvalue = substr($numvalue, 0 , 15);
                                                    break;
                                            }
                                            $task3->setCouponAutoGenerateValue($gvalue);
                                            $alttext=$gvalue;
                                            break;
                                        case "Alphanumeric":
                                            $numvalue = sha1(uniqid(mt_rand(),true));
                                            switch($glength){
                                                case "length":
                                                    break;
                                                case 4:
                                                    $gvalue = substr($numvalue, 0 , 4);
                                                    break;
                                                case 5:
                                                    $gvalue = substr($numvalue, 0 , 5);
                                                    break;
                                                case 6:
                                                    $gvalue = substr($numvalue, 0 , 6);
                                                    break;
                                                case 7:
                                                    $gvalue = substr($numvalue, 0 , 7);
                                                    break;
                                                case 8:
                                                    $gvalue = substr($numvalue, 0 , 8);
                                                    break;
                                                case 9:
                                                    $gvalue = substr($numvalue, 0 , 9);
                                                    break;
                                                case 10:
                                                    $gvalue = substr($numvalue, 0 , 10);
                                                    break;
                                                case 11:
                                                    $gvalue = substr($numvalue, 0 , 11);
                                                    break;
                                                case 12:
                                                    $gvalue = substr($numvalue, 0 , 12);
                                                    break;
                                                case 13:
                                                    $gvalue = substr($numvalue, 0 , 13);
                                                    break;
                                                case 14:
                                                    $gvalue = substr($numvalue, 0 , 14);
                                                    break;
                                                case 15:
                                                    $gvalue = substr($numvalue, 0 , 15);
                                                    break;
                                            }
                                            $task3->setCouponAutoGenerateValue($gvalue);
                                            $alttext=$gvalue;
                                            break;
                                    }
                                    break;
                            }
                            break;
                    }
                    if($alttext == "")
                    {
                        switch($barcodealttext){
                            case "same";
                                break;
                            case "static";
                                $gvalue = $task3->setCouponAutoGenerateValue($barcodealtfixedtext);
                                $finaltext = $gvalue;
                                break;
                            case "dynamic";
                                $gvalue = $task3->setCouponAutoGenerateValue($barcodealtdynamictext);
                                $finaltext=$gvalue;
                                break;
                        }
                    }

                    break;
            }

            //echo $task3->getCouponAutoGenerateValueLength();

            if($task9->getCouponRelevanceLocationAddressOne()){
                $latlng1 = self::latlngAction($task9->getCouponRelevanceLocationAddressOne());
                $task9->setCouponRelevanceLocationAddressOneLatitude($latlng1->lat);
                $task9->setCouponRelevanceLocationAddressOneLongitude($latlng1->lng);
            }
            if($task9->getCouponRelevanceLocationAddressTwo()){
                $latlng2 = self::latlngAction($task9->getCouponRelevanceLocationAddressTwo());
                $task9->setCouponRelevanceLocationAddressTwoLatitude($latlng2->lat);
                $task9->setCouponRelevanceLocationAddressTwoLongitude($latlng2->lng);
            }
            if($task9->getCouponRelevanceLocationAddressThree()){
                $latlng3 = self::latlngAction($task9->getCouponRelevanceLocationAddressThree());
                $task9->setCouponRelevanceLocationAddressThreeLatitude($latlng3->lat);
                $task9->setCouponRelevanceLocationAddressThreeLongitude($latlng3->lng);
            }
            if($task9->getCouponRelevanceLocationAddressFour()){
                $latlng4 = self::latlngAction($task9->getCouponRelevanceLocationAddressFour());
                $task9->setCouponRelevanceLocationAddressFourLatitude($latlng4->lat);
                $task9->setCouponRelevanceLocationAddressFourLongitude($latlng4->lng);
            }
            if($task9->getCouponRelevanceLocationAddressFive()){
                $latlng5 = self::latlngAction($task9->getCouponRelevanceLocationAddressFive());
                $task9->setCouponRelevanceLocationAddressFiveLatitude($latlng5->lat);
                $task9->setCouponRelevanceLocationAddressFiveLongitude($latlng5->lng);
            }
            if($task9->getCouponRelevanceLocationAddressSix()){
                $latlng6 = self::latlngAction($task9->getCouponRelevanceLocationAddressSix());
                $task9->setCouponRelevanceLocationAddressSixLatitude($latlng6->lat);
                $task9->setCouponRelevanceLocationAddressSixLongitude($latlng6->lng);
            }
            if($task9->getCouponRelevanceLocationAddressSeven()){
                $latlng7 = self::latlngAction($task9->getCouponRelevanceLocationAddressSeven());
                $task9->setCouponRelevanceLocationAddressSevenLatitude($latlng7->lat);
                $task9->setCouponRelevanceLocationAddressSevenLongitude($latlng7->lng);
            }
            if($task9->getCouponRelevanceLocationAddressEight()){
                $latlng8 = self::latlngAction($task9->getCouponRelevanceLocationAddressEight());
                $task9->setCouponRelevanceLocationAddressEightLatitude($latlng8->lat);
                $task9->setCouponRelevanceLocationAddressEightLongitude($latlng8->lng);
            }
            if($task9->getCouponRelevanceLocationAddressNine()){
                $latlng9 = self::latlngAction($task9->getCouponRelevanceLocationAddressNine());
                $task9->setCouponRelevanceLocationAddressNineLatitude($latlng9->lat);
                $task9->setCouponRelevanceLocationAddressNineLongitude($latlng9->lng);
            }
            if($task9->getCouponRelevanceLocationAddressTen()){
                $latlng10 = self::latlngAction($task9->getCouponRelevanceLocationAddressTen());
                $task9->setCouponRelevanceLocationAddressTenLatitude($latlng10->lat);
                $task9->setCouponRelevanceLocationAddressTenLongitude($latlng10->lng);
            }
            $task1->setCouponId($generalid);
            $task1->setPassKey($passid);
            $em->persist($task1);

            $task2->setCouponId($generalid);
            $em->persist($task2);

            $task3->setCouponId($generalid);
            $em->persist($task3);

            $task4->setCouponId($generalid);
            $em->persist($task4);

            $task5->setCouponId($generalid);
            $em->persist($task5);

            $task6->setCouponId($generalid);
            $em->persist($task6);

            $task7->setCouponId($generalid);
            $em->persist($task7);

            $task8->setCouponId($generalid);
            $em->persist($task8);

            $task9->setCouponId($generalid);
            $em->persist($task9);

            $task10->setCouponId($generalid);
            $em->persist($task10);
            $em->flush();
            //geting root


            //uploads code for form2(appearnes)
            $task2->uploads();
            $em->persist($task2);
            $em->flush();

            $root = $this->get('kernel')->getRootDir();


            ////////////calling pass generator/////////////////

            $createpass = self::generatePassAction($generalid);

            ///////sending pass to specified email/////////////

            $email = $request->request->get('myemail');
            if($email == ""){
            }
            else{
                $maildescription = '<b>'.$task1->getOrganizationName().' presents passbook generator Here is your latest pass</b>';

                $message = \Swift_Message::newInstance()
                    ->setSubject($task1->getOrganizationName())
                    ->setFrom('numerah@gmail.com')
                    ->setTo($email)
                    ->attach(\Swift_Attachment::fromPath($root.'/logs/pkpass/'.$createpass.'.pkpass'))
                    ->setBody($maildescription ,'text/html')
                ;
                $this->get('mailer')->send($message);
            }

            return $this->redirect($this->generateUrl('apb_appass_manage'));
        }
        return $this->render('apbappassBundle:Default:new.html.twig', array(
            'form1' => $form1->createView(),
            'form2' => $form2->createView(),
            'form3' => $form3->createView(),
            'form4' => $form4->createView(),
            'form5' => $form5->createView(),
            'form6' => $form6->createView(),
            'form7' => $form7->createView(),
            'form8' => $form8->createView(),
            'form9' => $form9->createView(),
            'form10' => $form10->createView(),
            ));
    }
    public function latlngAction($fieldvalue)
    {
        $data="http://maps.googleapis.com/maps/api/geocode/json?address=".$fieldvalue."&sensor=false";
        $str = str_replace(" ","%20",$data);
        $geocode_stats = file_get_contents($str);

        $output_deals = json_decode($geocode_stats);

        $latLng = $output_deals->results[0]->geometry->location;

       // $lat = $latLng->lat;
       // $lng = $latLng->lng;

        return $latLng;
    }
    public function latAction($fieldvalue)
    {
        $data="http://maps.googleapis.com/maps/api/geocode/json?address=".$fieldvalue."&sensor=false";
        $str = str_replace(" ","%20",$data);
        $geocode_stats = file_get_contents($str);

        $output_deals = json_decode($geocode_stats);

        $latLng = $output_deals->results[0]->geometry->location;

        $lat = $latLng->lat;
        return $lat;
    }
    public function lngAction($fieldvalue)
    {
        $data="http://maps.googleapis.com/maps/api/geocode/json?address=".$fieldvalue."&sensor=false";
        $str = str_replace(" ","%20",$data);
        $geocode_stats = file_get_contents($str);

        $output_deals = json_decode($geocode_stats);

        $latLng = $output_deals->results[0]->geometry->location;

        $lng = $latLng->lng;
        return $lng;
    }
    public function testAction()
    {
        return $this->render('apbappassBundle:Default:test.html.twig');
    }
    public function editAction($id, Request $request) {

        $em = $this->getDoctrine()->getManager();
        $task1 = $em->getRepository('apbappassBundle:mgeneral')->findOneBy(array('couponId' => $id));
        $task2 = $em->getRepository('apbappassBundle:mappearance')->findOneBy(array('couponId' => $id));
        $task3 = $em->getRepository('apbappassBundle:mdatasetting')->findOneBy(array('couponId' => $id));
        $task4 = $em->getRepository('apbappassBundle:mheader')->findOneBy(array('couponId' => $id));
        $task5 = $em->getRepository('apbappassBundle:mprimary')->findOneBy(array('couponId' => $id));
        $task6 = $em->getRepository('apbappassBundle:msecondary')->findOneBy(array('couponId' => $id));
        $task7 = $em->getRepository('apbappassBundle:mauxiliary')->findOneBy(array('couponId' => $id));
        $task8 = $em->getRepository('apbappassBundle:mbackfields')->findOneBy(array('couponId' => $id));
        $task9 = $em->getRepository('apbappassBundle:mrelevance')->findOneBy(array('couponId' => $id));
        $task10 = $em->getRepository('apbappassBundle:mdistribution')->findOneBy(array('couponId' => $id));

        $passid = $task1->getPassKey();
        $category = $task1->getCategoryName();
        $barcodevalue = $task3->getCouponAutoGenerateValue();
        $imagedir = __DIR__ . "/../../../../web/upload/";
        $root = $this->get('kernel')->getRootDir();

        //get current images paths
        $preIconName              = $task2->getIconName();
        $preLogoName              = $task2->getLogoName();
        $preGenericThumbnail      = $task2->getGenericThumbnail();
        $preBoardingPassFooter    = $task2->getBoardingPassFooter();
        $preCouponStrip           = $task2->getCouponStrip();
        $preStoreCardStrip        = $task2->getStoreCardStrip();
        $preEventTicketStrip      = $task2->getEventTicketStrip();
        $preEventTicketThumbnail  = $task2->getEventTicketThumbnail();
        $preEventTicketBackground = $task2->getEventTicketBackground();

        if (!$task2 && !$task3 && !$task4 && !$task5 && !$task6 && !$task7 && !$task8 && !$task9 && !$task10)
        {
            throw $this->createNotFoundException(
                'No pass found for id ' . $id
            );
        }

        $form1 = $this->createForm(new mgeneralType(), $task1);
        $form2 = $this->createForm(new mappearanceType(), $task2);
        $form3 = $this->createForm(new mdatasettingType(), $task3);
        $form4 = $this->createForm(new mheaderType(), $task4);
        $form5 = $this->createForm(new mprimaryType(), $task5);
        $form6 = $this->createForm(new msecondaryType(), $task6);
        $form7 = $this->createForm(new mauxiliaryType(), $task7);
        $form8 = $this->createForm(new mbackfieldsType(), $task8);
        $form9 = $this->createForm(new mrelevanceType(), $task9);
        $form10 = $this->createForm(new mdistributionType(), $task10);

        if ($request->isMethod('POST')) {

            $em = $this->getDoctrine()->getManager();

            //binding request
            $form1->bind($request);
            $form2->bind($request);
            $form3->bind($request);
            $form4->bind($request);
            $form5->bind($request);
            $form6->bind($request);
            $form7->bind($request);
            $form8->bind($request);
            $form9->bind($request);
            $form10->bind($request);

            ///////////////set barsode value/////////////////
            /////////////////////////////////////////////////

            $doptions = $task3->getCouponBarcodeValueSource();
            $gtype = $task3->getCouponAutoGenerateValueType();
            $glength = $task3->getCouponAutoGenerateValueLength();
            $barcodeoption = $task3->getCouponBarcodeValueOption();
            $barcodealttext = $task3->getBarcodeAlternateText();
            $barcodeFixedtext = $task3->getCouponBarcodeFixedValue();
            $barcodeDynamictext= $task3->getCouponBarcodeDynamicValue();
            $barcodealtfixedtext = $task3->getBarcodeAlternateFixedText();
            $barcodealtdynamictext = $task3->getBarcodeAlternateDynamicText();
            $barcodestatus = $task3->getCouponBarcodeStatus();
            $alttext="";
            switch($barcodestatus){
                case "hide":
                    $task3->setCouponAutoGenerateValue("hide");
                    break;

                case "show":
                    switch($barcodeoption){
                        case "Static":
                            if($barcodevalue == $barcodeFixedtext){

                                $task3->setCouponAutoGenerateValue($barcodevalue);
                            }
                            else{
                                $alttext=$barcodeFixedtext;
                                $task3->setCouponAutoGenerateValue($alttext);
                            }
                            break;
                        case "Dynamic":
                            switch($doptions)
                            {
                                case "Dynamic":
                                    if($barcodevalue == $barcodeDynamictext){

                                        $task3->setCouponAutoGenerateValue($barcodevalue);
                                    }
                                    else{

                                        $alttext=$barcodeDynamictext;
                                        $task3->setCouponAutoGenerateValue($alttext);
                                    }
                                    break;
                                case "autogen":
                                    switch($gtype){

                                        case "type":
                                            $numvalue = sha1(uniqid(mt_rand(),true));
                                            switch($glength){
                                                case "length":
                                                    break;
                                                case 4:
                                                    $gvalue = substr($numvalue, 0 , 4);
                                                    break;
                                                case 5:
                                                    $gvalue = substr($numvalue, 0 , 5);
                                                    break;
                                                case 6:
                                                    $gvalue = substr($numvalue, 0 , 6);
                                                    break;
                                                case 7:
                                                    $gvalue = substr($numvalue, 0 , 7);
                                                    break;
                                                case 8:
                                                    $gvalue = substr($numvalue, 0 , 8);
                                                    break;
                                                case 9:
                                                    $gvalue = substr($numvalue, 0 , 9);
                                                    break;
                                                case 10:
                                                    $gvalue = substr($numvalue, 0 , 10);
                                                    break;
                                                case 11:
                                                    $gvalue = substr($numvalue, 0 , 11);
                                                    break;
                                                case 12:
                                                    $gvalue = substr($numvalue, 0 , 12);
                                                    break;
                                                case 13:
                                                    $gvalue = substr($numvalue, 0 , 13);
                                                    break;
                                                case 14:
                                                    $gvalue = substr($numvalue, 0 , 14);
                                                    break;
                                                case 15:
                                                    $gvalue = substr($numvalue, 0 , 15);
                                                    break;
                                            }
                                            $task3->setCouponAutoGenerateValue($gvalue);
                                            $alttext=$gvalue;
                                            break;
                                        case "Numeric":
                                            $num1 = rand(100000,999999);
                                            $num2 = rand(100000,999999);
                                            $num3 = rand(100,999);
                                            $numvalue = $num1.$num2.$num3;;
                                            switch($glength){
                                                case "length":
                                                    break;
                                                case 4:
                                                    $gvalue = substr($numvalue, 0 , 4);
                                                    break;
                                                case 5:
                                                    $gvalue = substr($numvalue, 0 , 5);
                                                    break;
                                                case 6:
                                                    $gvalue = substr($numvalue, 0 , 6);
                                                    break;
                                                case 7:
                                                    $gvalue = substr($numvalue, 0 , 7);
                                                    break;
                                                case 8:
                                                    $gvalue = substr($numvalue, 0 , 8);
                                                    break;
                                                case 9:
                                                    $gvalue = substr($numvalue, 0 , 9);
                                                    break;
                                                case 10:
                                                    $gvalue = substr($numvalue, 0 , 10);
                                                    break;
                                                case 11:
                                                    $gvalue = substr($numvalue, 0 , 11);
                                                    break;
                                                case 12:
                                                    $gvalue = substr($numvalue, 0 , 12);
                                                    break;
                                                case 13:
                                                    $gvalue = substr($numvalue, 0 , 13);
                                                    break;
                                                case 14:
                                                    $gvalue = substr($numvalue, 0 , 14);
                                                    break;
                                                case 15:
                                                    $gvalue = substr($numvalue, 0 , 15);
                                                    break;
                                            }
                                            $task3->setCouponAutoGenerateValue($gvalue);
                                            $alttext=$gvalue;
                                            break;
                                        case "Alphabet":
                                            $seed = str_split('abcdefghijklmnopqrstuvwxyz'); // and any other characters
                                            shuffle($seed); // probably optional since array_is randomized; this may be redundant
                                            $rand = '';
                                            foreach (array_rand($seed, 16) as $k)
                                            {
                                                $rand .= $seed[$k];
                                            }

                                            $numvalue = $rand;
                                            switch($glength){
                                                case "length":
                                                    break;
                                                case 4:
                                                    $gvalue = substr($numvalue, 0 , 4);
                                                    break;
                                                case 5:
                                                    $gvalue = substr($numvalue, 0 , 5);
                                                    break;
                                                case 6:
                                                    $gvalue = substr($numvalue, 0 , 6);
                                                    break;
                                                case 7:
                                                    $gvalue = substr($numvalue, 0 , 7);
                                                    break;
                                                case 8:
                                                    $gvalue = substr($numvalue, 0 , 8);
                                                    break;
                                                case 9:
                                                    $gvalue = substr($numvalue, 0 , 9);
                                                    break;
                                                case 10:
                                                    $gvalue = substr($numvalue, 0 , 10);
                                                    break;
                                                case 11:
                                                    $gvalue = substr($numvalue, 0 , 11);
                                                    break;
                                                case 12:
                                                    $gvalue = substr($numvalue, 0 , 12);
                                                    break;
                                                case 13:
                                                    $gvalue = substr($numvalue, 0 , 13);
                                                    break;
                                                case 14:
                                                    $gvalue = substr($numvalue, 0 , 14);
                                                    break;
                                                case 15:
                                                    $gvalue = substr($numvalue, 0 , 15);
                                                    break;
                                            }
                                            $task3->setCouponAutoGenerateValue($gvalue);
                                            $alttext=$gvalue;
                                            break;
                                        case "Alphanumeric":
                                            $numvalue = sha1(uniqid(mt_rand(),true));
                                            switch($glength){
                                                case "length":
                                                    break;
                                                case 4:
                                                    $gvalue = substr($numvalue, 0 , 4);
                                                    break;
                                                case 5:
                                                    $gvalue = substr($numvalue, 0 , 5);
                                                    break;
                                                case 6:
                                                    $gvalue = substr($numvalue, 0 , 6);
                                                    break;
                                                case 7:
                                                    $gvalue = substr($numvalue, 0 , 7);
                                                    break;
                                                case 8:
                                                    $gvalue = substr($numvalue, 0 , 8);
                                                    break;
                                                case 9:
                                                    $gvalue = substr($numvalue, 0 , 9);
                                                    break;
                                                case 10:
                                                    $gvalue = substr($numvalue, 0 , 10);
                                                    break;
                                                case 11:
                                                    $gvalue = substr($numvalue, 0 , 11);
                                                    break;
                                                case 12:
                                                    $gvalue = substr($numvalue, 0 , 12);
                                                    break;
                                                case 13:
                                                    $gvalue = substr($numvalue, 0 , 13);
                                                    break;
                                                case 14:
                                                    $gvalue = substr($numvalue, 0 , 14);
                                                    break;
                                                case 15:
                                                    $gvalue = substr($numvalue, 0 , 15);
                                                    break;
                                            }
                                            $task3->setCouponAutoGenerateValue($gvalue);
                                            $alttext=$gvalue;
                                            break;
                                    }
                                    break;
                            }
                            break;
                    }
                    if($alttext == "")
                    {
                        switch($barcodealttext){
                            case "same";
                                    $task3->setCouponAutoGenerateValue($barcodevalue);
                                break;
                            case "static";
                                if($barcodevalue == $barcodealtfixedtext){

                                    $task3->setCouponAutoGenerateValue($barcodevalue);
                                }
                                else
                                {
                                    $gvalue = $task3->setCouponAutoGenerateValue($barcodealtfixedtext);
                                    $finaltext = $gvalue;
                                }
                                break;
                            case "dynamic";
                                if($barcodevalue == $barcodealtdynamictext){

                                    $task3->setCouponAutoGenerateValue($barcodevalue);
                                }
                                else
                                {
                                    $gvalue = $task3->setCouponAutoGenerateValue($barcodealtdynamictext);
                                    $finaltext=$gvalue;
                                }
                                break;
                        }
                    }

                    break;
            }


            //fixed values
            $task1->setPassKey($passid);
            $task1->setCategoryName($category);


            //coupon id
            if($task9->getCouponRelevanceLocationAddressOne()){
                $latlng1 = self::latlngAction($task9->getCouponRelevanceLocationAddressOne());
                $task9->setCouponRelevanceLocationAddressOneLatitude($latlng1->lat);
                $task9->setCouponRelevanceLocationAddressOneLongitude($latlng1->lng);
            }
            if($task9->getCouponRelevanceLocationAddressTwo()){
                $latlng2 = self::latlngAction($task9->getCouponRelevanceLocationAddressTwo());
                $task9->setCouponRelevanceLocationAddressTwoLatitude($latlng2->lat);
                $task9->setCouponRelevanceLocationAddressTwoLongitude($latlng2->lng);
            }
            if($task9->getCouponRelevanceLocationAddressThree()){
                $latlng3 = self::latlngAction($task9->getCouponRelevanceLocationAddressThree());
                $task9->setCouponRelevanceLocationAddressThreeLatitude($latlng3->lat);
                $task9->setCouponRelevanceLocationAddressThreeLongitude($latlng3->lng);
            }
            if($task9->getCouponRelevanceLocationAddressFour()){
                $latlng4 = self::latlngAction($task9->getCouponRelevanceLocationAddressFour());
                $task9->setCouponRelevanceLocationAddressFourLatitude($latlng4->lat);
                $task9->setCouponRelevanceLocationAddressFourLongitude($latlng4->lng);
            }
            if($task9->getCouponRelevanceLocationAddressFive()){
                $latlng5 = self::latlngAction($task9->getCouponRelevanceLocationAddressFive());
                $task9->setCouponRelevanceLocationAddressFiveLatitude($latlng5->lat);
                $task9->setCouponRelevanceLocationAddressFiveLongitude($latlng5->lng);
            }
            if($task9->getCouponRelevanceLocationAddressSix()){
                $latlng6 = self::latlngAction($task9->getCouponRelevanceLocationAddressSix());
                $task9->setCouponRelevanceLocationAddressSixLatitude($latlng6->lat);
                $task9->setCouponRelevanceLocationAddressSixLongitude($latlng6->lng);
            }
            if($task9->getCouponRelevanceLocationAddressSeven()){
                $latlng7 = self::latlngAction($task9->getCouponRelevanceLocationAddressSeven());
                $task9->setCouponRelevanceLocationAddressSevenLatitude($latlng7->lat);
                $task9->setCouponRelevanceLocationAddressSevenLongitude($latlng7->lng);
            }
            if($task9->getCouponRelevanceLocationAddressEight()){
                $latlng8 = self::latlngAction($task9->getCouponRelevanceLocationAddressEight());
                $task9->setCouponRelevanceLocationAddressEightLatitude($latlng8->lat);
                $task9->setCouponRelevanceLocationAddressEightLongitude($latlng8->lng);
            }
            if($task9->getCouponRelevanceLocationAddressNine()){
                $latlng9 = self::latlngAction($task9->getCouponRelevanceLocationAddressNine());
                $task9->setCouponRelevanceLocationAddressNineLatitude($latlng9->lat);
                $task9->setCouponRelevanceLocationAddressNineLongitude($latlng9->lng);
            }
            if($task9->getCouponRelevanceLocationAddressTen()){
                $latlng10 = self::latlngAction($task9->getCouponRelevanceLocationAddressTen());
                $task9->setCouponRelevanceLocationAddressTenLatitude($latlng10->lat);
                $task9->setCouponRelevanceLocationAddressTenLongitude($latlng10->lng);
            }
            $task1->setCouponId($id);
            $task2->setCouponId($id);
            $task3->setCouponId($id);
            $task4->setCouponId($id);
            $task5->setCouponId($id);
            $task6->setCouponId($id);
            $task7->setCouponId($id);
            $task8->setCouponId($id);
            $task9->setCouponId($id);
            $task10->setCouponId($id);


            /*echo '<pre>';
            print_r($task2);
            echo '</pre>';*/
            //exit();

            $task2->uploads('edit',$preIconName,$preLogoName,$preGenericThumbnail,$preBoardingPassFooter,$preCouponStrip,
                $preStoreCardStrip ,$preEventTicketStrip, $preEventTicketThumbnail, $preEventTicketBackground
            );
            $em->persist($task2);
            $em->flush();
            $createpass = self::generatePassAction($id);
            $email = $request->request->get('myemail');
            if($email == ""){
            }
            else{
                $maildescription = '<b>'.$task1->getOrganizationName().' presents passbook generator Here is your latest pass</b>';

                $message = \Swift_Message::newInstance()
                    ->setSubject($task1->getOrganizationName())
                    ->setFrom('numerah@gmail.com')
                    ->setTo($email)
                    ->attach(\Swift_Attachment::fromPath($root.'/logs/pkpass/'.$createpass.'.pkpass'))
                    ->setBody($maildescription ,'text/html')
                ;
                $this->get('mailer')->send($message);
            }
            return $this->redirect($this->generateUrl('apb_appass_manage'));
        }
        return $this->render('apbappassBundle:Default:edit.html.twig', array(
            'form1' => $form1->createView(),
            'form2' => $form2->createView(),
            'form3' => $form3->createView(),
            'form4' => $form4->createView(),
            'form5' => $form5->createView(),
            'form6' => $form6->createView(),
            'form7' => $form7->createView(),
            'form8' => $form8->createView(),
            'form9' => $form9->createView(),
            'form10' => $form10->createView(),
            'task2'  => $task2
        ));
    }
    public function generatePassAction($id) {

        $em = $this->getDoctrine()->getManager();
        $task1 = $em->getRepository('apbappassBundle:mgeneral')->findOneBy(array('couponId' => $id));
        $task2 = $em->getRepository('apbappassBundle:mappearance')->findOneBy(array('couponId' => $id));
        $task3 = $em->getRepository('apbappassBundle:mdatasetting')->findOneBy(array('couponId' => $id));
        $task4 = $em->getRepository('apbappassBundle:mheader')->findOneBy(array('couponId' => $id));
        $task5 = $em->getRepository('apbappassBundle:mprimary')->findOneBy(array('couponId' => $id));
        $task6 = $em->getRepository('apbappassBundle:msecondary')->findOneBy(array('couponId' => $id));
        $task7 = $em->getRepository('apbappassBundle:mauxiliary')->findOneBy(array('couponId' => $id));
        $task8 = $em->getRepository('apbappassBundle:mbackfields')->findOneBy(array('couponId' => $id));
        $task9 = $em->getRepository('apbappassBundle:mrelevance')->findOneBy(array('couponId' => $id));
        $task10 = $em->getRepository('apbappassBundle:mdistribution')->findOneBy(array('couponId' => $id));

        $passid = $task1->getPassKey();
        $category = $task1->getCategoryName();
        $taskid = $task2->getId();
        $mainlogo = $task2->getLogoName();
        $mainicon = $task2->getIconName();
        $genericthumbnail = $task2->getGenericThumbnail();
        $boardingpassfooter = $task2->getBoardingPassFooter();
        $couponstrip = $task2->getCouponStrip();
        $storecardstrip = $task2->getStoreCardStrip();
        $etstrip = $task2->getEventTicketStrip();
        $etthumbnail = $task2->getEventTicketThumbnail();
        $etbackground = $task2->getEventTicketBackground();
        $barcodestatus = $task3->getCouponBarcodeStatus();

        $root = $this->get('kernel')->getRootDir();            /////path to root
        $zip = new \ZipArchive();
        if ($zip->open($root.'/logs/pkpass/'.$id.'.pkpass') === TRUE)
        {
            $zip->deleteName('thumbnail.png');
            $zip->deleteName('thumbnail@2x.png');
            $zip->deleteName('strip.png');
            $zip->deleteName('strip@2x.png');
            $zip->deleteName('logo.png');
            $zip->deleteName('logo@2x.png');
            $zip->deleteName('footer.png');
            $zip->deleteName('footer@2x.png');
            $zip->deleteName('background.png');
            $zip->deleteName('background@2x.png');
            $zip->close();
        }
        $imagedir = __DIR__ . "/../../../../web/upload/";

        if (!$task2 && !$task3 && !$task4 && !$task5 && !$task6 && !$task7 && !$task8 && !$task9 && !$task10)
        {
            throw $this->createNotFoundException(
                'No pass found for id ' . $id
            );
        }
        /////////////////////////pass generation/////////////////////////
        /////////////////////////////////////////////////////////////////


        //echo $task3->getCouponAutoGenerateValue();
        // setting pass type and images
        switch($task1->getCategoryName()){

            case "Generic":
                $pass = new Generic($id, $task1->getTemplateName());
                if($genericthumbnail){
                    $thumbnail = new Image( $imagedir.$taskid."/".$genericthumbnail."", 'thumbnail');
                    $pass->addImage($thumbnail);
                    $thumbnail = new Image( $imagedir.$taskid."/".$genericthumbnail."", 'thumbnail@2x');
                    $pass->addImage($thumbnail);
                }
                break;
            case "Boarding Pass":
                switch($task1->getBoardingPassTransit()){
                    case "PKTransitTypeAir":
                        $pass = new BoardingPass($id, $task1->getTemplateName(), BoardingPass::TYPE_AIR);
                        break;
                    case "PKTransitTypeBus":
                        $pass = new BoardingPass($id, $task1->getTemplateName(), BoardingPass::TYPE_BUS);
                        break;
                    case "PKTransitTypeTrain":
                        $pass = new BoardingPass($id, $task1->getTemplateName(), BoardingPass::TYPE_TRAIN);
                        break;
                    case "PKTransitTypeBoat":
                        $pass = new BoardingPass($id, $task1->getTemplateName(), BoardingPass::TYPE_BOAT);
                        break;
                    case "PKTransitTypeGeneric":
                        $pass = new BoardingPass($id, $task1->getTemplateName(), BoardingPass::TYPE_GENERIC);
                        break;
                }
                if($boardingpassfooter){
                    $footer = new Image( $imagedir.$taskid."/".$boardingpassfooter."", 'footer');
                    $pass->addImage($footer);
                    $footer = new Image( $imagedir.$taskid."/".$boardingpassfooter."", 'footer@2x');
                    $pass->addImage($footer);
                }
                break;
            case "Coupon":
                $pass = new Coupon($id, $task1->getTemplateName());
                if($couponstrip){
                    $strip = new Image( $imagedir.$taskid."/".$couponstrip."", 'strip');
                    $pass->addImage($strip);
                    $strip = new Image( $imagedir.$taskid."/".$couponstrip."", 'strip@2x');
                    $pass->addImage($strip);
                }
                break;
            case "Event Ticket":
                $pass = new EventTicket($id, $task1->getTemplateName());
                switch($task2->getEventTicketStatus()){
                    case "Layout 1: Strip":
                        if($etstrip){
                            $strip = new Image( $imagedir.$taskid."/".$etstrip."", 'strip');
                            $pass->addImage($strip);
                            $strip = new Image( $imagedir.$taskid."/".$etstrip."", 'strip@2x');
                            $pass->addImage($strip);
                        }
                        break;
                    case "Layout 2: Background/Thumbnail":
                        if($etbackground){
                            $background = new Image( $imagedir.$taskid."/".$etbackground."", 'background');
                            $pass->addImage($background);
                            $background = new Image( $imagedir.$taskid."/".$etbackground."", 'background@2x');
                            $pass->addImage($background);
                        }
                        if($etthumbnail){
                            $thumbnail = new Image( $imagedir.$taskid."/".$etthumbnail."", 'thumbnail');
                            $pass->addImage($thumbnail);
                            $thumbnail = new Image( $imagedir.$taskid."/".$etthumbnail."", 'thumbnail@2x');
                            $pass->addImage($thumbnail);
                        }
                        break;
                }
                break;
            case "Store Card":
                $pass = new StoreCard($id, $task1->getTemplateName());
                if($storecardstrip){
                    $strip = new Image( $imagedir.$taskid."/".$storecardstrip."", 'strip');
                    $pass->addImage($strip);
                    $strip = new Image( $imagedir.$taskid."/".$storecardstrip."", 'strip@2x');
                    $pass->addImage($strip);
                }
                break;
        }
        $pass->setBackgroundColor($task2->getBackgroundColorCode());
        $pass->setForegroundColor($task2->getFieldValueColorCode());
        $pass->setLabelColor($task2->getFieldLabelColorCode());
        $pass->setLogoText($task2->getLogoText());

        // Add icon image
        if($mainicon == ""){
            $icon = new Image( $root.'/Resources/Images/mCouponsLogoIcon58x58.png', 'icon');
            $pass->addImage($icon);
            $icon = new Image( $root.'/Resources/Images/mCouponsLogoIcon58x58@2x.png', 'icon@2x');
            $pass->addImage($icon);
        }
        else{

            $icon = new Image( $imagedir.$taskid."/".$mainicon."", 'icon');
            $pass->addImage($icon);
            $icon = new Image( $imagedir.$taskid."/".$mainicon."", 'icon@2x');
            $pass->addImage($icon);
        }
        if($mainlogo){
            $logo = new Image( $imagedir.$taskid."/".$mainlogo."", 'logo');
            $pass->addImage($logo);
            $logo = new Image( $imagedir.$taskid."/".$mainlogo."", 'logo@2x');
            $pass->addImage($logo);
        }
        // Create pass structure
        $structure = new Structure();
        // Add header field
        switch($task4->getCouponHeaderValueType()){
            case "text":
                $header = new Field($task4->getCouponHeaderValueType()."h1",
                    $task4->getCouponHeaderTextValue().".");
                $header->setLabel(strtoupper($task4->getCouponHeaderLabel()));
                $header->setTextAlignment($task4->getCouponHeaderAlignmnet());
                $structure->addHeaderField($header);
                break;
            case "datentime":
                $header = new DateField($task4->getCouponHeaderValueType()."h1",
                    $task4->getCouponHeaderValueDate());
                   // ' '.$task4->getCouponHeaderValueTime()->format('H:i:s').".");
                $header->setLabel(strtoupper($task4->getCouponHeaderLabel()));
                $header->setDateStyle('PKDateStyleFull');
                $header->setTextAlignment($task4->getCouponHeaderAlignmnet());
                $structure->addHeaderField($header);
                break;
            case "number":
                $header = new Field($task4->getCouponHeaderValueType()."h1",
                    $task4->getCouponHeaderNumberValue().".");
                $header->setLabel(strtoupper($task4->getCouponHeaderLabel()));
                $header->setTextAlignment($task4->getCouponHeaderAlignmnet());
                $structure->addHeaderField($header);
                break;
            case "currency":
                $header = new Field($task4->getCouponHeaderValueType()."h1",
                    $task4->getCouponHeaderCurrencyValue().
                    $task4->getCouponHeaderCurrencyCode().".");
                $header->setLabel(strtoupper($task4->getCouponHeaderLabel()));
                $header->setTextAlignment($task4->getCouponHeaderAlignmnet());
                $structure->addHeaderField($header);
                break;
        }

        // Add primary field

        switch($task5->getCouponPrimaryFieldValueType()){
            case "text":
                $primary = new Field($task5->getCouponPrimaryFieldValueType()."p1",
                    $task5->getCouponPrimaryFieldTextValue().".");
                $primary->setLabel(strtoupper($task5->getCouponPrimaryFieldLabel()));
                $structure->addPrimaryField($primary);
                break;
            case "datentime":
                $primary = new Field($task5->getCouponPrimaryFieldValueType()."p1",
                    $task5->getCouponPrimaryFieldValueDate()->format('Y-m-d').
                    '.'.$task5->getCouponPrimaryFieldValueTime()->format('H:i:s'));
                //     '.'.$task5->getCouponPrimaryFieldValueTimezone());
                $primary->setLabel(strtoupper($task5->getCouponPrimaryFieldLabel()));
                $structure->addPrimaryField($primary);
                break;
            case "number":
                $primary = new Field($task5->getCouponPrimaryFieldValueType()."p1",
                    $task5->getCouponPrimaryFieldNumberValue().".");
                $primary->setLabel(strtoupper($task5->getCouponPrimaryFieldLabel()));
                $structure->addPrimaryField($primary);
                break;
            case "currency":
                $primary = new Field($task5->getCouponPrimaryFieldValueType()."p1",
                    $task5->getCouponPrimaryFieldCurrencyValue().
                    $task5->getCouponPrimaryFieldCurrencyCode().".");
                $primary->setLabel(strtoupper($task5->getCouponPrimaryFieldLabel()));
                $structure->addPrimaryField($primary);
                break;
        }
        // Add secondary field
        switch($task6->getCouponSecondaryFieldTotalFields()){
            case 0:

                break;
            case 1:
                switch($task6->getCouponSecondaryFieldValueTypeOne()){
                    case "text":
                        $secondary1 = new Field($task6->getCouponSecondaryFieldValueTypeOne()."s11",
                            $task6->getCouponSecondaryFieldTextValueOne().".");
                        $secondary1->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelOne()));
                        $secondary1->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetOne());
                        $structure->addSecondaryField($secondary1);
                        break;
                    case "datentime":
                        $secondary1 = new Field($task6->getCouponSecondaryFieldValueTypeOne()."s11",
                            $task6->getCouponSecondaryFieldValueDateOne()->format('Y-m-d').
                            ' '.$task6->getCouponSecondaryFieldValueTimeOne()->format('h:m').
                            ' '.$task6->getCouponSecondaryFieldValueTimezoneOne().".");
                        $secondary1->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelOne()));
                        $secondary1->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetOne());
                        $structure->addSecondaryField($secondary1);
                        break;
                    case "number":
                        $secondary1 = new Field($task6->getCouponSecondaryFieldValueTypeOne()."s11",
                            $task6->getCouponSecondaryFieldNumberValueOne().".");
                        $secondary1->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelOne()));
                        $secondary1->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetOne());
                        $structure->addSecondaryField($secondary1);
                        break;
                    case "currency":
                        $secondary1 = new Field($task6->getCouponSecondaryFieldValueTypeOne()."s11",
                            $task6->getCouponSecondaryFieldCurrencyValueOne().".");
                        $secondary1->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelOne()));
                        $secondary1->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetOne());
                        $structure->addSecondaryField($secondary1);
                        break;
                }
                break;
            case 2:
                switch($task6->getCouponSecondaryFieldValueTypeOne()){
                    case "text":
                        $secondary1 = new Field($task6->getCouponSecondaryFieldValueTypeOne()."s11",
                            $task6->getCouponSecondaryFieldTextValueOne().".");
                        $secondary1->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelOne()));
                        $secondary1->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetOne());
                        $structure->addSecondaryField($secondary1);
                        break;
                    case "datentime":
                        $secondary1 = new Field($task6->getCouponSecondaryFieldValueTypeOne()."s11",
                            $task6->getCouponSecondaryFieldValueDateOne()->format('Y-m-d').
                            ' '.$task6->getCouponSecondaryFieldValueTimeOne()->format('h:m').
                            ' '.$task6->getCouponSecondaryFieldValueTimezoneOne().".");
                        $secondary1->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelOne()));
                        $secondary1->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetOne());
                        $structure->addSecondaryField($secondary1);
                        break;
                    case "number":
                        $secondary1 = new Field($task6->getCouponSecondaryFieldValueTypeOne()."s11",
                            $task6->getCouponSecondaryFieldNumberValueOne().".");
                        $secondary1->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelOne()));
                        $secondary1->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetOne());
                        $structure->addSecondaryField($secondary1);
                        break;
                    case "currency":
                        $secondary1 = new Field($task6->getCouponSecondaryFieldValueTypeOne()."s11",
                            $task6->getCouponSecondaryFieldCurrencyValueOne().".");
                        $secondary1->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelOne()));
                        $secondary1->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetOne());
                        $structure->addSecondaryField($secondary1);
                        break;
                }
                switch($task6->getCouponSecondaryFieldValueTypeTwo()){
                    case "text":
                        $secondary2 = new Field($task6->getCouponSecondaryFieldValueTypeTwo()."s21",
                            $task6->getCouponSecondaryFieldTextValueTwo().".");
                        $secondary2->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelTwo()));
                        $secondary2->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetTwo());
                        $structure->addSecondaryField($secondary2);
                        break;
                    case "datentime":
                        $secondary2 = new Field($task6->getCouponSecondaryFieldValueTypeTwo()."s21",
                            $task6->getCouponSecondaryFieldValueDateTwo()->format('Y-m-d').
                            ' '.$task6->getCouponSecondaryFieldValueTimeTwo()->format('h:m').
                            ' '.$task6->getCouponSecondaryFieldValueTimezoneTwo().".");
                        $secondary2->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelTwo()));
                        $secondary2->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetTwo());
                        $structure->addSecondaryField($secondary2);
                        break;
                    case "number":
                        $secondary2 = new Field($task6->getCouponSecondaryFieldValueTypeTwo()."s21",
                            $task6->getCouponSecondaryFieldNumberValueTwo().".");
                        $secondary2->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelTwo()));
                        $secondary2->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetTwo());
                        $structure->addSecondaryField($secondary2);
                        break;
                    case "currency":
                        $secondary2 = new Field($task6->getCouponSecondaryFieldValueTypeTwo()."s21",
                            $task6->getCouponSecondaryFieldCurrencyValueTwo().".");
                        $secondary2->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelTwo()));
                        $secondary2->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetTwo());
                        $structure->addSecondaryField($secondary2);
                        break;
                }
                break;
            case 3:
                if($task1->getCategoryName()=='Coupon'){
                    switch($task6->getCouponSecondaryFieldValueTypeOne()){
                        case "text":
                            $secondary1 = new Field($task6->getCouponSecondaryFieldValueTypeOne()."s11",
                                $task6->getCouponSecondaryFieldTextValueOne().".");
                            $secondary1->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelOne()));
                            $secondary1->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetOne());
                            $structure->addSecondaryField($secondary1);
                            break;
                        case "datentime":
                            $secondary1 = new Field($task6->getCouponSecondaryFieldValueTypeOne()."s11",
                                $task6->getCouponSecondaryFieldValueDateOne()->format('Y-m-d').
                                ' '.$task6->getCouponSecondaryFieldValueTimeOne()->format('h:m').
                                ' '.$task6->getCouponSecondaryFieldValueTimezoneOne().".");
                            $secondary1->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelOne()));
                            $secondary1->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetOne());
                            $structure->addSecondaryField($secondary1);
                            break;
                        case "number":
                            $secondary1 = new Field($task6->getCouponSecondaryFieldValueTypeOne()."s11",
                                $task6->getCouponSecondaryFieldNumberValueOne().".");
                            $secondary1->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelOne()));
                            $secondary1->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetOne());
                            $structure->addSecondaryField($secondary1);
                            break;
                        case "currency":
                            $secondary1 = new Field($task6->getCouponSecondaryFieldValueTypeOne()."s11",
                                $task6->getCouponSecondaryFieldCurrencyValueOne().".");
                            $secondary1->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelOne()));
                            $secondary1->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetOne());
                            $structure->addSecondaryField($secondary1);
                            break;
                    }
                    switch($task6->getCouponSecondaryFieldValueTypeTwo()){
                        case "text":
                            $secondary2 = new Field($task6->getCouponSecondaryFieldValueTypeTwo()."s21",
                                $task6->getCouponSecondaryFieldTextValueTwo().".");
                            $secondary2->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelTwo()));
                            $secondary2->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetTwo());
                            $structure->addSecondaryField($secondary2);
                            break;
                        case "datentime":
                            $secondary2 = new Field($task6->getCouponSecondaryFieldValueTypeTwo()."s21",
                                $task6->getCouponSecondaryFieldValueDateTwo()->format('Y-m-d').
                                ' '.$task6->getCouponSecondaryFieldValueTimeTwo()->format('h:m').
                                ' '.$task6->getCouponSecondaryFieldValueTimezoneTwo().".");
                            $secondary2->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelTwo()));
                            $secondary2->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetTwo());
                            $structure->addSecondaryField($secondary2);
                            break;
                        case "number":
                            $secondary2 = new Field($task6->getCouponSecondaryFieldValueTypeTwo()."s21",
                                $task6->getCouponSecondaryFieldNumberValueTwo().".");
                            $secondary2->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelTwo()));
                            $secondary2->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetTwo());
                            $structure->addSecondaryField($secondary2);
                            break;
                        case "currency":
                            $secondary2 = new Field($task6->getCouponSecondaryFieldValueTypeTwo()."s21",
                                $task6->getCouponSecondaryFieldCurrencyValueTwo().".");
                            $secondary2->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelTwo()));
                            $secondary2->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetTwo());
                            $structure->addSecondaryField($secondary2);
                            break;
                    }
                }
                else{
                    switch($task6->getCouponSecondaryFieldValueTypeOne()){
                        case "text":
                            $secondary1 = new Field($task6->getCouponSecondaryFieldValueTypeOne()."s11",
                                $task6->getCouponSecondaryFieldTextValueOne().".");
                            $secondary1->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelOne()));
                            $secondary1->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetOne());
                            $structure->addSecondaryField($secondary1);
                            break;
                        case "datentime":
                            $secondary1 = new Field($task6->getCouponSecondaryFieldValueTypeOne()."s11",
                                $task6->getCouponSecondaryFieldValueDateOne()->format('Y-m-d').
                                ' '.$task6->getCouponSecondaryFieldValueTimeOne()->format('h:m').
                                ' '.$task6->getCouponSecondaryFieldValueTimezoneOne().".");
                            $secondary1->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelOne()));
                            $secondary1->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetOne());
                            $structure->addSecondaryField($secondary1);
                            break;
                        case "number":
                            $secondary1 = new Field($task6->getCouponSecondaryFieldValueTypeOne()."s11",
                                $task6->getCouponSecondaryFieldNumberValueOne().".");
                            $secondary1->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelOne()));
                            $secondary1->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetOne());
                            $structure->addSecondaryField($secondary1);
                            break;
                        case "currency":
                            $secondary1 = new Field($task6->getCouponSecondaryFieldValueTypeOne()."s11",
                                $task6->getCouponSecondaryFieldCurrencyValueOne().".");
                            $secondary1->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelOne()));
                            $secondary1->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetOne());
                            $structure->addSecondaryField($secondary1);
                            break;
                    }
                    switch($task6->getCouponSecondaryFieldValueTypeTwo()){
                        case "text":
                            $secondary2 = new Field($task6->getCouponSecondaryFieldValueTypeTwo()."s21",
                                $task6->getCouponSecondaryFieldTextValueTwo().".");
                            $secondary2->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelTwo()));
                            $secondary2->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetTwo());
                            $structure->addSecondaryField($secondary2);
                            break;
                        case "datentime":
                            $secondary2 = new Field($task6->getCouponSecondaryFieldValueTypeTwo()."s21",
                                $task6->getCouponSecondaryFieldValueDateTwo()->format('Y-m-d').
                                ' '.$task6->getCouponSecondaryFieldValueTimeTwo()->format('h:m').
                                ' '.$task6->getCouponSecondaryFieldValueTimezoneTwo().".");
                            $secondary2->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelTwo()));
                            $secondary2->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetTwo());
                            $structure->addSecondaryField($secondary2);
                            break;
                        case "number":
                            $secondary2 = new Field($task6->getCouponSecondaryFieldValueTypeTwo()."s21",
                                $task6->getCouponSecondaryFieldNumberValueTwo().".");
                            $secondary2->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelTwo()));
                            $secondary2->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetTwo());
                            $structure->addSecondaryField($secondary2);
                            break;
                        case "currency":
                            $secondary2 = new Field($task6->getCouponSecondaryFieldValueTypeTwo()."s21",
                                $task6->getCouponSecondaryFieldCurrencyValueTwo().".");
                            $secondary2->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelTwo()));
                            $secondary2->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetTwo());
                            $structure->addSecondaryField($secondary2);
                            break;
                    }
                    switch($task6->getCouponSecondaryFieldValueTypeThree()){
                        case "text":
                            $secondary3 = new Field($task6->getCouponSecondaryFieldValueTypeThree()."s31",
                                $task6->getCouponSecondaryFieldTextValueThree().".");
                            $secondary3->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelThree()));
                            $secondary3->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetThree());
                            $structure->addSecondaryField($secondary3);
                            break;
                        case "datentime":
                            $secondary3 = new Field($task6->getCouponSecondaryFieldValueTypeThree()."s31",
                                $task6->getCouponSecondaryFieldValueDateThree()->format('Y-m-d').
                                ' '.$task6->getCouponSecondaryFieldValueTimeThree()->format('h:m').
                                ' '.$task6->getCouponSecondaryFieldValueTimezoneThree().".");
                            $secondary3->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelThree()));
                            $secondary3->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetThree());
                            $structure->addSecondaryField($secondary3);
                            break;
                        case "number":
                            $secondary3 = new Field($task6->getCouponSecondaryFieldValueTypeThree()."s31",
                                $task6->getCouponSecondaryFieldNumberValueThree().".");
                            $secondary3->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelThree()));
                            $secondary3->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetThree());
                            $structure->addSecondaryField($secondary3);
                            break;
                        case "currency":
                            $secondary3 = new Field($task6->getCouponSecondaryFieldValueTypeThree()."s31",
                                $task6->getCouponSecondaryFieldCurrencyValueThree().".");
                            $secondary3->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelThree()));
                            $secondary3->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetThree());
                            $structure->addSecondaryField($secondary3);
                            break;
                    }
                }

                break;
            case 4:
                if($task1->getCategoryName()=='Coupon'){
                    switch($task6->getCouponSecondaryFieldValueTypeOne()){
                        case "text":
                            $secondary1 = new Field($task6->getCouponSecondaryFieldValueTypeOne()."s11",
                                $task6->getCouponSecondaryFieldTextValueOne().".");
                            $secondary1->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelOne()));
                            $secondary1->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetOne());
                            $structure->addSecondaryField($secondary1);
                            break;
                        case "datentime":
                            $secondary1 = new Field($task6->getCouponSecondaryFieldValueTypeOne()."s11",
                                $task6->getCouponSecondaryFieldValueDateOne()->format('Y-m-d').
                                ' '.$task6->getCouponSecondaryFieldValueTimeOne()->format('h:m').
                                ' '.$task6->getCouponSecondaryFieldValueTimezoneOne().".");
                            $secondary1->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelOne()));
                            $secondary1->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetOne());
                            $structure->addSecondaryField($secondary1);
                            break;
                        case "number":
                            $secondary1 = new Field($task6->getCouponSecondaryFieldValueTypeOne()."s11",
                                $task6->getCouponSecondaryFieldNumberValueOne().".");
                            $secondary1->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelOne()));
                            $secondary1->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetOne());
                            $structure->addSecondaryField($secondary1);
                            break;
                        case "currency":
                            $secondary1 = new Field($task6->getCouponSecondaryFieldValueTypeOne()."s11",
                                $task6->getCouponSecondaryFieldCurrencyValueOne().".");
                            $secondary1->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelOne()));
                            $secondary1->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetOne());
                            $structure->addSecondaryField($secondary1);
                            break;
                    }
                    switch($task6->getCouponSecondaryFieldValueTypeTwo()){
                        case "text":
                            $secondary2 = new Field($task6->getCouponSecondaryFieldValueTypeTwo()."s21",
                                $task6->getCouponSecondaryFieldTextValueTwo().".");
                            $secondary2->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelTwo()));
                            $secondary2->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetTwo());
                            $structure->addSecondaryField($secondary2);
                            break;
                        case "datentime":
                            $secondary2 = new Field($task6->getCouponSecondaryFieldValueTypeTwo()."s21",
                                $task6->getCouponSecondaryFieldValueDateTwo()->format('Y-m-d').
                                ' '.$task6->getCouponSecondaryFieldValueTimeTwo()->format('h:m').
                                ' '.$task6->getCouponSecondaryFieldValueTimezoneTwo().".");
                            $secondary2->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelTwo()));
                            $secondary2->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetTwo());
                            $structure->addSecondaryField($secondary2);
                            break;
                        case "number":
                            $secondary2 = new Field($task6->getCouponSecondaryFieldValueTypeTwo()."s21",
                                $task6->getCouponSecondaryFieldNumberValueTwo().".");
                            $secondary2->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelTwo()));
                            $secondary2->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetTwo());
                            $structure->addSecondaryField($secondary2);
                            break;
                        case "currency":
                            $secondary2 = new Field($task6->getCouponSecondaryFieldValueTypeTwo()."s21",
                                $task6->getCouponSecondaryFieldCurrencyValueTwo().".");
                            $secondary2->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelTwo()));
                            $secondary2->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetTwo());
                            $structure->addSecondaryField($secondary2);
                            break;
                    }
                }
                else{
                    switch($task6->getCouponSecondaryFieldValueTypeOne()){
                        case "text":
                            $secondary1 = new Field($task6->getCouponSecondaryFieldValueTypeOne()."s11",
                                $task6->getCouponSecondaryFieldTextValueOne().".");
                            $secondary1->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelOne()));
                            $secondary1->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetOne());
                            $structure->addSecondaryField($secondary1);
                            break;
                        case "datentime":
                            $secondary1 = new Field($task6->getCouponSecondaryFieldValueTypeOne()."s11",
                                $task6->getCouponSecondaryFieldValueDateOne()->format('Y-m-d').
                                ' '.$task6->getCouponSecondaryFieldValueTimeOne()->format('h:m').
                                ' '.$task6->getCouponSecondaryFieldValueTimezoneOne().".");
                            $secondary1->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelOne()));
                            $secondary1->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetOne());
                            $structure->addSecondaryField($secondary1);
                            break;
                        case "number":
                            $secondary1 = new Field($task6->getCouponSecondaryFieldValueTypeOne()."s11",
                                $task6->getCouponSecondaryFieldNumberValueOne().".");
                            $secondary1->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelOne()));
                            $secondary1->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetOne());
                            $structure->addSecondaryField($secondary1);
                            break;
                        case "currency":
                            $secondary1 = new Field($task6->getCouponSecondaryFieldValueTypeOne()."s11",
                                $task6->getCouponSecondaryFieldCurrencyValueOne().".");
                            $secondary1->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelOne()));
                            $secondary1->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetOne());
                            $structure->addSecondaryField($secondary1);
                            break;
                    }
                    switch($task6->getCouponSecondaryFieldValueTypeTwo()){
                        case "text":
                            $secondary2 = new Field($task6->getCouponSecondaryFieldValueTypeTwo()."s21",
                                $task6->getCouponSecondaryFieldTextValueTwo().".");
                            $secondary2->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelTwo()));
                            $secondary2->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetTwo());
                            $structure->addSecondaryField($secondary2);
                            break;
                        case "datentime":
                            $secondary2 = new Field($task6->getCouponSecondaryFieldValueTypeTwo()."s21",
                                $task6->getCouponSecondaryFieldValueDateTwo()->format('Y-m-d').
                                ' '.$task6->getCouponSecondaryFieldValueTimeTwo()->format('h:m').
                                ' '.$task6->getCouponSecondaryFieldValueTimezoneTwo().".");
                            $secondary2->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelTwo()));
                            $secondary2->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetTwo());
                            $structure->addSecondaryField($secondary2);
                            break;
                        case "number":
                            $secondary2 = new Field($task6->getCouponSecondaryFieldValueTypeTwo()."s21",
                                $task6->getCouponSecondaryFieldNumberValueTwo().".");
                            $secondary2->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelTwo()));
                            $secondary2->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetTwo());
                            $structure->addSecondaryField($secondary2);
                            break;
                        case "currency":
                            $secondary2 = new Field($task6->getCouponSecondaryFieldValueTypeTwo()."s21",
                                $task6->getCouponSecondaryFieldCurrencyValueTwo().".");
                            $secondary2->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelTwo()));
                            $secondary2->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetTwo());
                            $structure->addSecondaryField($secondary2);
                            break;
                    }
                    switch($task6->getCouponSecondaryFieldValueTypeThree()){
                        case "text":
                            $secondary3 = new Field($task6->getCouponSecondaryFieldValueTypeThree()."s31",
                                $task6->getCouponSecondaryFieldTextValueThree().".");
                            $secondary3->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelThree()));
                            $secondary3->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetThree());
                            $structure->addSecondaryField($secondary3);
                            break;
                        case "datentime":
                            $secondary3 = new Field($task6->getCouponSecondaryFieldValueTypeThree()."s31",
                                $task6->getCouponSecondaryFieldValueDateThree()->format('Y-m-d').
                                ' '.$task6->getCouponSecondaryFieldValueTimeThree()->format('h:m').
                                ' '.$task6->getCouponSecondaryFieldValueTimezoneThree().".");
                            $secondary3->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelThree()));
                            $secondary3->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetThree());
                            $structure->addSecondaryField($secondary3);
                            break;
                        case "number":
                            $secondary3 = new Field($task6->getCouponSecondaryFieldValueTypeThree()."s31",
                                $task6->getCouponSecondaryFieldNumberValueThree().".");
                            $secondary3->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelThree()));
                            $secondary3->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetThree());
                            $structure->addSecondaryField($secondary3);
                            break;
                        case "currency":
                            $secondary3 = new Field($task6->getCouponSecondaryFieldValueTypeThree()."s31",
                                $task6->getCouponSecondaryFieldCurrencyValueThree().".");
                            $secondary3->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelThree()));
                            $secondary3->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetThree());
                            $structure->addSecondaryField($secondary3);
                            break;
                    }
                    switch($task6->getCouponSecondaryFieldValueTypeFour()){
                        case "text":
                            $secondary4 = new Field($task6->getCouponSecondaryFieldValueTypeFour()."s31",
                                $task6->getCouponSecondaryFieldTextValueFour().".");
                            $secondary4->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelFour()));
                            $secondary4->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetFour());
                            $structure->addSecondaryField($secondary4);
                            break;
                        case "datentime":
                            $secondary4 = new Field($task6->getCouponSecondaryFieldValueTypeFour()."s31",
                                $task6->getCouponSecondaryFieldValueDateFour()->format('Y-m-d').
                                ' '.$task6->getCouponSecondaryFieldValueTimeFour()->format('h:m').
                                ' '.$task6->getCouponSecondaryFieldValueTimezoneFour().".");
                            $secondary4->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelFour()));
                            $secondary4->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetFour());
                            $structure->addSecondaryField($secondary4);
                            break;
                        case "number":
                            $secondary4 = new Field($task6->getCouponSecondaryFieldValueTypeFour()."s31",
                                $task6->getCouponSecondaryFieldNumberValueFour().".");
                            $secondary4->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelFour()));
                            $secondary4->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetFour());
                            $structure->addSecondaryField($secondary4);
                            break;
                        case "currency":
                            $secondary4 = new Field($task6->getCouponSecondaryFieldValueTypeFour()."s31",
                                $task6->getCouponSecondaryFieldCurrencyValueFour().".");
                            $secondary4->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelFour()));
                            $secondary4->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetFour());
                            $structure->addSecondaryField($secondary4);
                            break;
                    }
                }
                break;
        }

        // Add auxiliary field
        if($task1->getCategoryName()=="Generic" && $task3->getCouponBarcodeType()=="Aztec" ){

        }
        else if($task1->getCategoryName()=="Generic" && $task3->getCouponBarcodeType()=="QRCode" ){

        }
        else
        {
            switch($task7->getCouponAuxiliaryFieldTotalFields()){
                case 0:

                    break;
                case 1:
                    switch($task7->getCouponAuxiliaryFieldValueTypeOne()){
                        case "text":
                            $auxiliary1 = new Field($task7->getCouponAuxiliaryFieldValueTypeOne()."a11",
                                $task7->getCouponAuxiliaryFieldTextValueOne().".");
                            $auxiliary1->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelOne()));
                            $structure->addAuxiliaryField($auxiliary1);
                            break;
                        case "datentime":
                            $auxiliary1 = new Field($task7->getCouponAuxiliaryFieldValueTypeOne()."a11",
                                $task7->getCouponAuxiliaryFieldValueDateOne()->format('Y-m-d').
                                ' '.$task7->getCouponAuxiliaryFieldValueTimeOne()->format('h:m').
                                ' '.$task7->getCouponAuxiliaryFieldValueTimezoneOne().".");
                            $auxiliary1->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelOne()));
                            $structure->addAuxiliaryField($auxiliary1);
                            break;
                        case "number":
                            $auxiliary1 = new Field($task7->getCouponAuxiliaryFieldValueTypeOne()."a11",
                                $task7->getCouponAuxiliaryFieldNumberValueOne().".");
                            $auxiliary1->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelOne()));
                            $structure->addAuxiliaryField($auxiliary1);
                            break;
                        case "currency":
                            $auxiliary1 = new Field($task7->getCouponAuxiliaryFieldValueTypeOne()."a11",
                                $task7->getCouponAuxiliaryFieldCurrencyValueOne().".");
                            $auxiliary1->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelOne()));
                            $structure->addAuxiliaryField($auxiliary1);
                            break;
                    }
                    break;
                case 2:
                    switch($task7->getCouponAuxiliaryFieldValueTypeOne()){
                        case "text":
                            $auxiliary1 = new Field($task7->getCouponAuxiliaryFieldValueTypeOne()."a11",
                                $task7->getCouponAuxiliaryFieldTextValueOne().".");
                            $auxiliary1->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelOne()));
                            $structure->addAuxiliaryField($auxiliary1);
                            break;
                        case "datentime":
                            $auxiliary1 = new Field($task7->getCouponAuxiliaryFieldValueTypeOne()."a11",
                                $task7->getCouponAuxiliaryFieldValueDateOne()->format('Y-m-d').
                                ' '.$task7->getCouponAuxiliaryFieldValueTimeOne()->format('h:m').
                                ' '.$task7->getCouponAuxiliaryFieldValueTimezoneOne().".");
                            $auxiliary1->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelOne()));
                            $structure->addAuxiliaryField($auxiliary1);
                            break;
                        case "number":
                            $auxiliary1 = new Field($task7->getCouponAuxiliaryFieldValueTypeOne()."a11",
                                $task7->getCouponAuxiliaryFieldNumberValueOne().".");
                            $auxiliary1->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelOne()));
                            $structure->addAuxiliaryField($auxiliary1);
                            break;
                        case "currency":
                            $auxiliary1 = new Field($task7->getCouponAuxiliaryFieldValueTypeOne()."a11",
                                $task7->getCouponAuxiliaryFieldCurrencyValueOne().".");
                            $auxiliary1->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelOne()));
                            $structure->addAuxiliaryField($auxiliary1);
                            break;
                    }
                    switch($task7->getCouponAuxiliaryFieldValueTypeTwo()){
                        case "text":
                            $auxiliary2 = new Field($task7->getCouponAuxiliaryFieldValueTypeTwo()."a21",
                                $task7->getCouponAuxiliaryFieldTextValueTwo().".");
                            $auxiliary2->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelTwo()));
                            $structure->addAuxiliaryField($auxiliary2);
                            break;
                        case "datentime":
                            $auxiliary2 = new Field($task7->getCouponAuxiliaryFieldValueTypeTwo()."a21",
                                $task7->getCouponAuxiliaryFieldValueDateTwo()->format('Y-m-d').
                                ' '.$task7->getCouponAuxiliaryFieldValueTimeTwo()->format('h:m').
                                ' '.$task7->getCouponAuxiliaryFieldValueTimezoneTwo().".");
                            $auxiliary2->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelTwo()));
                            $structure->addAuxiliaryField($auxiliary2);
                            break;
                        case "number":
                            $auxiliary2 = new Field($task7->getCouponAuxiliaryFieldValueTypeTwo()."a21",
                                $task7->getCouponAuxiliaryFieldNumberValueTwo().".");
                            $auxiliary2->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelTwo()));
                            $structure->addAuxiliaryField($auxiliary2);
                            break;
                        case "currency":
                            $auxiliary2 = new Field($task7->getCouponAuxiliaryFieldValueTypeTwo()."a21",
                                $task7->getCouponAuxiliaryFieldCurrencyValueTwo().".");
                            $auxiliary2->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelTwo()));
                            $structure->addAuxiliaryField($auxiliary2);
                            break;
                    }
                    break;
                case 3:
                    if($task1->getCategoryName()=='Coupon'){
                        switch($task7->getCouponAuxiliaryFieldValueTypeOne()){
                            case "text":
                                $auxiliary1 = new Field($task7->getCouponAuxiliaryFieldValueTypeOne()."a11",
                                    $task7->getCouponAuxiliaryFieldTextValueOne().".");
                                $auxiliary1->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelOne()));
                                $structure->addAuxiliaryField($auxiliary1);
                                break;
                            case "datentime":
                                $auxiliary1 = new Field($task7->getCouponAuxiliaryFieldValueTypeOne()."a11",
                                    $task7->getCouponAuxiliaryFieldValueDateOne()->format('Y-m-d').
                                    ' '.$task7->getCouponAuxiliaryFieldValueTimeOne()->format('h:m').
                                    ' '.$task7->getCouponAuxiliaryFieldValueTimezoneOne().".");
                                $auxiliary1->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelOne()));
                                $structure->addAuxiliaryField($auxiliary1);
                                break;
                            case "number":
                                $auxiliary1 = new Field($task7->getCouponAuxiliaryFieldValueTypeOne()."a11",
                                    $task7->getCouponAuxiliaryFieldNumberValueOne().".");
                                $auxiliary1->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelOne()));
                                $structure->addAuxiliaryField($auxiliary1);
                                break;
                            case "currency":
                                $auxiliary1 = new Field($task7->getCouponAuxiliaryFieldValueTypeOne()."a11",
                                    $task7->getCouponAuxiliaryFieldCurrencyValueOne().".");
                                $auxiliary1->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelOne()));
                                $structure->addAuxiliaryField($auxiliary1);
                                break;
                        }
                        switch($task7->getCouponAuxiliaryFieldValueTypeTwo()){
                            case "text":
                                $auxiliary2 = new Field($task7->getCouponAuxiliaryFieldValueTypeTwo()."a21",
                                    $task7->getCouponAuxiliaryFieldTextValueTwo().".");
                                $auxiliary2->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelTwo()));
                                $structure->addAuxiliaryField($auxiliary2);
                                break;
                            case "datentime":
                                $auxiliary2 = new Field($task7->getCouponAuxiliaryFieldValueTypeTwo()."a21",
                                    $task7->getCouponAuxiliaryFieldValueDateTwo()->format('Y-m-d').
                                    ' '.$task7->getCouponAuxiliaryFieldValueTimeTwo()->format('h:m').
                                    ' '.$task7->getCouponAuxiliaryFieldValueTimezoneTwo().".");
                                $auxiliary2->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelTwo()));
                                $structure->addAuxiliaryField($auxiliary2);
                                break;
                            case "number":
                                $auxiliary2 = new Field($task7->getCouponAuxiliaryFieldValueTypeTwo()."a21",
                                    $task7->getCouponAuxiliaryFieldNumberValueTwo().".");
                                $auxiliary2->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelTwo()));
                                $structure->addAuxiliaryField($auxiliary2);
                                break;
                            case "currency":
                                $auxiliary2 = new Field($task7->getCouponAuxiliaryFieldValueTypeTwo()."a21",
                                    $task7->getCouponAuxiliaryFieldCurrencyValueTwo().".");
                                $auxiliary2->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelTwo()));
                                $structure->addAuxiliaryField($auxiliary2);
                                break;
                        }
                        break;
                    }
                    else{
                        switch($task7->getCouponAuxiliaryFieldValueTypeOne()){
                            case "text":
                                $auxiliary1 = new Field($task7->getCouponAuxiliaryFieldValueTypeOne()."a11",
                                    $task7->getCouponAuxiliaryFieldTextValueOne().".");
                                $auxiliary1->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelOne()));
                                $structure->addAuxiliaryField($auxiliary1);
                                break;
                            case "datentime":
                                $auxiliary1 = new Field($task7->getCouponAuxiliaryFieldValueTypeOne()."a11",
                                    $task7->getCouponAuxiliaryFieldValueDateOne()->format('Y-m-d').
                                    ' '.$task7->getCouponAuxiliaryFieldValueTimeOne()->format('h:m').
                                    ' '.$task7->getCouponAuxiliaryFieldValueTimezoneOne().".");
                                $auxiliary1->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelOne()));
                                $structure->addAuxiliaryField($auxiliary1);
                                break;
                            case "number":
                                $auxiliary1 = new Field($task7->getCouponAuxiliaryFieldValueTypeOne()."a11",
                                    $task7->getCouponAuxiliaryFieldNumberValueOne().".");
                                $auxiliary1->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelOne()));
                                $structure->addAuxiliaryField($auxiliary1);
                                break;
                            case "currency":
                                $auxiliary1 = new Field($task7->getCouponAuxiliaryFieldValueTypeOne()."a11",
                                    $task7->getCouponAuxiliaryFieldCurrencyValueOne().".");
                                $auxiliary1->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelOne()));
                                $structure->addAuxiliaryField($auxiliary1);
                                break;
                        }
                        switch($task7->getCouponAuxiliaryFieldValueTypeTwo()){
                            case "text":
                                $auxiliary2 = new Field($task7->getCouponAuxiliaryFieldValueTypeTwo()."a21",
                                    $task7->getCouponAuxiliaryFieldTextValueTwo().".");
                                $auxiliary2->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelTwo()));
                                $structure->addAuxiliaryField($auxiliary2);
                                break;
                            case "datentime":
                                $auxiliary2 = new Field($task7->getCouponAuxiliaryFieldValueTypeTwo()."a21",
                                    $task7->getCouponAuxiliaryFieldValueDateTwo()->format('Y-m-d').
                                    ' '.$task7->getCouponAuxiliaryFieldValueTimeTwo()->format('h:m').
                                    ' '.$task7->getCouponAuxiliaryFieldValueTimezoneTwo().".");
                                $auxiliary2->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelTwo()));
                                $structure->addAuxiliaryField($auxiliary2);
                                break;
                            case "number":
                                $auxiliary2 = new Field($task7->getCouponAuxiliaryFieldValueTypeTwo()."a21",
                                    $task7->getCouponAuxiliaryFieldNumberValueTwo().".");
                                $auxiliary2->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelTwo()));
                                $structure->addAuxiliaryField($auxiliary2);
                                break;
                            case "currency":
                                $auxiliary2 = new Field($task7->getCouponAuxiliaryFieldValueTypeTwo()."a21",
                                    $task7->getCouponAuxiliaryFieldCurrencyValueTwo().".");
                                $auxiliary2->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelTwo()));
                                $structure->addAuxiliaryField($auxiliary2);
                                break;
                        }
                        switch($task7->getCouponAuxiliaryFieldValueTypeThree()){
                            case "text":
                                $auxiliary3 = new Field($task7->getCouponAuxiliaryFieldValueTypeThree()."a31",
                                    $task7->getCouponAuxiliaryFieldTextValueThree().".");
                                $auxiliary3->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelThree()));
                                $structure->addAuxiliaryField($auxiliary3);
                                break;
                            case "datentime":
                                $auxiliary3 = new Field($task7->getCouponAuxiliaryFieldValueTypeThree()."a31",
                                    $task7->getCouponAuxiliaryFieldValueDateThree()->format('Y-m-d').
                                    ' '.$task7->getCouponAuxiliaryFieldValueTimeThree()->format('h:m').
                                    ' '.$task7->getCouponAuxiliaryFieldValueTimezoneThree().".");
                                $auxiliary3->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelThree()));
                                $structure->addAuxiliaryField($auxiliary3);
                                break;
                            case "number":
                                $auxiliary3 = new Field($task7->getCouponAuxiliaryFieldValueTypeThree()."a31",
                                    $task7->getCouponAuxiliaryFieldNumberValueThree().".");
                                $auxiliary3->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelThree()));
                                $structure->addAuxiliaryField($auxiliary3);
                                break;
                            case "currency":
                                $auxiliary3 = new Field($task7->getCouponAuxiliaryFieldValueTypeThree()."a31",
                                    $task7->getCouponAuxiliaryFieldCurrencyValueThree().".");
                                $auxiliary3->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelThree()));
                                $structure->addAuxiliaryField($auxiliary3);
                                break;
                        }
                        break;

                    }
                case 4:
                    if($task1->getCategoryName()=='Coupon'){
                        switch($task7->getCouponAuxiliaryFieldValueTypeOne()){
                            case "text":
                                $auxiliary1 = new Field($task7->getCouponAuxiliaryFieldValueTypeOne()."a11",
                                    $task7->getCouponAuxiliaryFieldTextValueOne().".");
                                $auxiliary1->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelOne()));
                                $structure->addAuxiliaryField($auxiliary1);
                                break;
                            case "datentime":
                                $auxiliary1 = new Field($task7->getCouponAuxiliaryFieldValueTypeOne()."a11",
                                    $task7->getCouponAuxiliaryFieldValueDateOne()->format('Y-m-d').
                                    ' '.$task7->getCouponAuxiliaryFieldValueTimeOne()->format('h:m').
                                    ' '.$task7->getCouponAuxiliaryFieldValueTimezoneOne().".");
                                $auxiliary1->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelOne()));
                                $structure->addAuxiliaryField($auxiliary1);
                                break;
                            case "number":
                                $auxiliary1 = new Field($task7->getCouponAuxiliaryFieldValueTypeOne()."a11",
                                    $task7->getCouponAuxiliaryFieldNumberValueOne().".");
                                $auxiliary1->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelOne()));
                                $structure->addAuxiliaryField($auxiliary1);
                                break;
                            case "currency":
                                $auxiliary1 = new Field($task7->getCouponAuxiliaryFieldValueTypeOne()."a11",
                                    $task7->getCouponAuxiliaryFieldCurrencyValueOne().".");
                                $auxiliary1->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelOne()));
                                $structure->addAuxiliaryField($auxiliary1);
                                break;
                        }
                        switch($task7->getCouponAuxiliaryFieldValueTypeTwo()){
                            case "text":
                                $auxiliary2 = new Field($task7->getCouponAuxiliaryFieldValueTypeTwo()."a21",
                                    $task7->getCouponAuxiliaryFieldTextValueTwo().".");
                                $auxiliary2->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelTwo()));
                                $structure->addAuxiliaryField($auxiliary2);
                                break;
                            case "datentime":
                                $auxiliary2 = new Field($task7->getCouponAuxiliaryFieldValueTypeTwo()."a21",
                                    $task7->getCouponAuxiliaryFieldValueDateTwo()->format('Y-m-d').
                                    ' '.$task7->getCouponAuxiliaryFieldValueTimeTwo()->format('h:m').
                                    ' '.$task7->getCouponAuxiliaryFieldValueTimezoneTwo().".");
                                $auxiliary2->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelTwo()));
                                $structure->addAuxiliaryField($auxiliary2);
                                break;
                            case "number":
                                $auxiliary2 = new Field($task7->getCouponAuxiliaryFieldValueTypeTwo()."a21",
                                    $task7->getCouponAuxiliaryFieldNumberValueTwo().".");
                                $auxiliary2->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelTwo()));
                                $structure->addAuxiliaryField($auxiliary2);
                                break;
                            case "currency":
                                $auxiliary2 = new Field($task7->getCouponAuxiliaryFieldValueTypeTwo()."a21",
                                    $task7->getCouponAuxiliaryFieldCurrencyValueTwo().".");
                                $auxiliary2->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelTwo()));
                                $structure->addAuxiliaryField($auxiliary2);
                                break;
                        }
                        break;
                    }
                    else{
                        switch($task7->getCouponAuxiliaryFieldValueTypeOne()){
                            case "text":
                                $auxiliary1 = new Field($task7->getCouponAuxiliaryFieldValueTypeOne()."a11",
                                    $task7->getCouponAuxiliaryFieldTextValueOne().".");
                                $auxiliary1->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelOne()));
                                $structure->addAuxiliaryField($auxiliary1);
                                break;
                            case "datentime":
                                $auxiliary1 = new Field($task7->getCouponAuxiliaryFieldValueTypeOne()."a11",
                                    $task7->getCouponAuxiliaryFieldValueDateOne()->format('Y-m-d').
                                    ' '.$task7->getCouponAuxiliaryFieldValueTimeOne()->format('h:m').
                                    ' '.$task7->getCouponAuxiliaryFieldValueTimezoneOne().".");
                                $auxiliary1->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelOne()));
                                $structure->addAuxiliaryField($auxiliary1);
                                break;
                            case "number":
                                $auxiliary1 = new Field($task7->getCouponAuxiliaryFieldValueTypeOne()."a11",
                                    $task7->getCouponAuxiliaryFieldNumberValueOne().".");
                                $auxiliary1->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelOne()));
                                $structure->addAuxiliaryField($auxiliary1);
                                break;
                            case "currency":
                                $auxiliary1 = new Field($task7->getCouponAuxiliaryFieldValueTypeOne()."a11",
                                    $task7->getCouponAuxiliaryFieldCurrencyValueOne().".");
                                $auxiliary1->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelOne()));
                                $structure->addAuxiliaryField($auxiliary1);
                                break;
                        }
                        switch($task7->getCouponAuxiliaryFieldValueTypeTwo()){
                            case "text":
                                $auxiliary2 = new Field($task7->getCouponAuxiliaryFieldValueTypeTwo()."a21",
                                    $task7->getCouponAuxiliaryFieldTextValueTwo().".");
                                $auxiliary2->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelTwo()));
                                $structure->addAuxiliaryField($auxiliary2);
                                break;
                            case "datentime":
                                $auxiliary2 = new Field($task7->getCouponAuxiliaryFieldValueTypeTwo()."a21",
                                    $task7->getCouponAuxiliaryFieldValueDateTwo()->format('Y-m-d').
                                    ' '.$task7->getCouponAuxiliaryFieldValueTimeTwo()->format('h:m').
                                    ' '.$task7->getCouponAuxiliaryFieldValueTimezoneTwo().".");
                                $auxiliary2->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelTwo()));
                                $structure->addAuxiliaryField($auxiliary2);
                                break;
                            case "number":
                                $auxiliary2 = new Field($task7->getCouponAuxiliaryFieldValueTypeTwo()."a21",
                                    $task7->getCouponAuxiliaryFieldNumberValueTwo().".");
                                $auxiliary2->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelTwo()));
                                $structure->addAuxiliaryField($auxiliary2);
                                break;
                            case "currency":
                                $auxiliary2 = new Field($task7->getCouponAuxiliaryFieldValueTypeTwo()."a21",
                                    $task7->getCouponAuxiliaryFieldCurrencyValueTwo().".");
                                $auxiliary2->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelTwo()));
                                $structure->addAuxiliaryField($auxiliary2);
                                break;
                        }
                        switch($task7->getCouponAuxiliaryFieldValueTypeThree()){
                            case "text":
                                $auxiliary3 = new Field($task7->getCouponAuxiliaryFieldValueTypeThree()."a31",
                                    $task7->getCouponAuxiliaryFieldTextValueThree().".");
                                $auxiliary3->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelThree()));
                                $structure->addAuxiliaryField($auxiliary3);
                                break;
                            case "datentime":
                                $auxiliary3 = new Field($task7->getCouponAuxiliaryFieldValueTypeThree()."a31",
                                    $task7->getCouponAuxiliaryFieldValueDateThree()->format('Y-m-d').
                                    ' '.$task7->getCouponAuxiliaryFieldValueTimeThree()->format('h:m').
                                    ' '.$task7->getCouponAuxiliaryFieldValueTimezoneThree().".");
                                $auxiliary3->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelThree()));
                                $structure->addAuxiliaryField($auxiliary3);
                                break;
                            case "number":
                                $auxiliary3 = new Field($task7->getCouponAuxiliaryFieldValueTypeThree()."a31",
                                    $task7->getCouponAuxiliaryFieldNumberValueThree().".");
                                $auxiliary3->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelThree()));
                                $structure->addAuxiliaryField($auxiliary3);
                                break;
                            case "currency":
                                $auxiliary3 = new Field($task7->getCouponAuxiliaryFieldValueTypeThree()."a31",
                                    $task7->getCouponAuxiliaryFieldCurrencyValueThree().".");
                                $auxiliary3->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelThree()));
                                $structure->addAuxiliaryField($auxiliary3);
                                break;
                        }
                        switch($task7->getCouponAuxiliaryFieldValueTypeFour()){
                            case "text":
                                $auxiliary4 = new Field($task7->getCouponAuxiliaryFieldValueTypeFour()."a41",
                                    $task7->getCouponAuxiliaryFieldTextValueFour().".");
                                $auxiliary4->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelFour()));
                                $structure->addAuxiliaryField($auxiliary4);
                                break;
                            case "datentime":
                                $auxiliary4 = new Field($task7->getCouponAuxiliaryFieldValueTypeFour()."a41",
                                    $task7->getCouponAuxiliaryFieldValueDateFour()->format('Y-m-d').
                                    ' '.$task7->getCouponAuxiliaryFieldValueTimeFour()->format('h:m').
                                    ' '.$task7->getCouponAuxiliaryFieldValueTimezoneFour().".");
                                $auxiliary4->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelFour()));
                                $structure->addAuxiliaryField($auxiliary4);
                                break;
                            case "number":
                                $auxiliary4 = new Field($task7->getCouponAuxiliaryFieldValueTypeFour()."a41",
                                    $task7->getCouponAuxiliaryFieldNumberValueFour().".");
                                $auxiliary4->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelFour()));
                                $structure->addAuxiliaryField($auxiliary4);
                                break;
                            case "currency":
                                $auxiliary4 = new Field($task7->getCouponAuxiliaryFieldValueTypeFour()."a41",
                                    $task7->getCouponAuxiliaryFieldCurrencyValueFour().".");
                                $auxiliary4->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelFour()));
                                $structure->addAuxiliaryField($auxiliary4);
                                break;
                        }
                    }
                    break;
            }
        }
        // Add Back Fields

        switch ($task8->getCouponBackFieldTotalFields()) {
            case 0:

                break;
            case 1:
                $backfield1 = new Field("Textb11", $task8->getCouponBackFieldTextValueOne().".");
                $backfield1->setLabel($task8->getCouponBackFieldLabelOne());
                $structure->addBackField($backfield1);
                break;
            case 2:
                $backfield1 = new Field("Textb11", $task8->getCouponBackFieldTextValueOne().".");
                $backfield1->setLabel($task8->getCouponBackFieldLabelOne());
                $structure->addBackField($backfield1);

                $backfield2 = new Field("Textb21", $task8->getCouponBackFieldTextValueTwo().".");
                $backfield2->setLabel($task8->getCouponBackFieldLabelTwo());
                $structure->addBackField($backfield2);
                break;
            case 3:
                $backfield1 = new Field("Textb11", $task8->getCouponBackFieldTextValueOne().".");
                $backfield1->setLabel($task8->getCouponBackFieldLabelOne());
                $structure->addBackField($backfield1);

                $backfield2 = new Field("Textb21", $task8->getCouponBackFieldTextValueTwo().".");
                $backfield2->setLabel($task8->getCouponBackFieldLabelTwo());
                $structure->addBackField($backfield2);

                $backfield3 = new Field("Textb31", $task8->getCouponBackFieldTextValueThree().".");
                $backfield3->setLabel($task8->getCouponBackFieldLabelThree());
                $structure->addBackField($backfield3);
                break;
            case 4:
                $backfield1 = new Field("Textb11", $task8->getCouponBackFieldTextValueOne().".");
                $backfield1->setLabel($task8->getCouponBackFieldLabelOne());
                $structure->addBackField($backfield1);

                $backfield2 = new Field("Textb21", $task8->getCouponBackFieldTextValueTwo().".");
                $backfield2->setLabel($task8->getCouponBackFieldLabelTwo());
                $structure->addBackField($backfield2);

                $backfield3 = new Field("Textb31", $task8->getCouponBackFieldTextValueThree().".");
                $backfield3->setLabel($task8->getCouponBackFieldLabelThree());
                $structure->addBackField($backfield3);

                $backfield4 = new Field("Textb41", $task8->getCouponBackFieldTextValueFour().".");
                $backfield4->setLabel($task8->getCouponBackFieldLabelFour());
                $structure->addBackField($backfield4);
                break;
            case 5:
                $backfield1 = new Field("Textb11", $task8->getCouponBackFieldTextValueOne().".");
                $backfield1->setLabel($task8->getCouponBackFieldLabelOne());
                $structure->addBackField($backfield1);

                $backfield2 = new Field("Textb21", $task8->getCouponBackFieldTextValueTwo().".");
                $backfield2->setLabel($task8->getCouponBackFieldLabelTwo());
                $structure->addBackField($backfield2);

                $backfield3 = new Field("Textb31", $task8->getCouponBackFieldTextValueThree().".");
                $backfield3->setLabel($task8->getCouponBackFieldLabelThree());
                $structure->addBackField($backfield3);

                $backfield4 = new Field("Textb41", $task8->getCouponBackFieldTextValueFour().".");
                $backfield4->setLabel($task8->getCouponBackFieldLabelFour());
                $structure->addBackField($backfield4);

                $backfield5 = new Field("Textb51", $task8->getCouponBackFieldTextValueFive().".");
                $backfield5->setLabel($task8->getCouponBackFieldLabelFive());
                $structure->addBackField($backfield5);
                break;
            case 6:
                $backfield1 = new Field("Textb11", $task8->getCouponBackFieldTextValueOne().".");
                $backfield1->setLabel($task8->getCouponBackFieldLabelOne());
                $structure->addBackField($backfield1);

                $backfield2 = new Field("Textb21", $task8->getCouponBackFieldTextValueTwo().".");
                $backfield2->setLabel($task8->getCouponBackFieldLabelTwo());
                $structure->addBackField($backfield2);

                $backfield3 = new Field("Textb31", $task8->getCouponBackFieldTextValueThree().".");
                $backfield3->setLabel($task8->getCouponBackFieldLabelThree());
                $structure->addBackField($backfield3);

                $backfield4 = new Field("Textb41", $task8->getCouponBackFieldTextValueFour().".");
                $backfield4->setLabel($task8->getCouponBackFieldLabelFour());
                $structure->addBackField($backfield4);

                $backfield5 = new Field("Textb51", $task8->getCouponBackFieldTextValueFive().".");
                $backfield5->setLabel($task8->getCouponBackFieldLabelFive());
                $structure->addBackField($backfield5);

                $backfield6 = new Field("Textb61", $task8->getCouponBackFieldTextValueSix().".");
                $backfield6->setLabel($task8->getCouponBackFieldLabelSix());
                $structure->addBackField($backfield6);
                break;
            case 7:
                $backfield1 = new Field("Textb11", $task8->getCouponBackFieldTextValueOne().".");
                $backfield1->setLabel($task8->getCouponBackFieldLabelOne());
                $structure->addBackField($backfield1);

                $backfield2 = new Field("Textb21", $task8->getCouponBackFieldTextValueTwo().".");
                $backfield2->setLabel($task8->getCouponBackFieldLabelTwo());
                $structure->addBackField($backfield2);

                $backfield3 = new Field("Textb31", $task8->getCouponBackFieldTextValueThree().".");
                $backfield3->setLabel($task8->getCouponBackFieldLabelThree());
                $structure->addBackField($backfield3);

                $backfield4 = new Field("Textb41", $task8->getCouponBackFieldTextValueFour().".");
                $backfield4->setLabel($task8->getCouponBackFieldLabelFour());
                $structure->addBackField($backfield4);

                $backfield5 = new Field("Textb51", $task8->getCouponBackFieldTextValueFive().".");
                $backfield5->setLabel($task8->getCouponBackFieldLabelFive());
                $structure->addBackField($backfield5);

                $backfield6 = new Field("Textb61", $task8->getCouponBackFieldTextValueSix().".");
                $backfield6->setLabel($task8->getCouponBackFieldLabelSix());
                $structure->addBackField($backfield6);

                $backfield7 = new Field("Textb71", $task8->getCouponBackFieldTextValueSeven().".");
                $backfield7->setLabel($task8->getCouponBackFieldLabelSeven());
                $structure->addBackField($backfield7);
                break;
            case 8:
                $backfield1 = new Field("Textb11", $task8->getCouponBackFieldTextValueOne().".");
                $backfield1->setLabel($task8->getCouponBackFieldLabelOne());
                $structure->addBackField($backfield1);

                $backfield2 = new Field("Textb21", $task8->getCouponBackFieldTextValueTwo().".");
                $backfield2->setLabel($task8->getCouponBackFieldLabelTwo());
                $structure->addBackField($backfield2);

                $backfield3 = new Field("Textb31", $task8->getCouponBackFieldTextValueThree().".");
                $backfield3->setLabel($task8->getCouponBackFieldLabelThree());
                $structure->addBackField($backfield3);

                $backfield4 = new Field("Textb41", $task8->getCouponBackFieldTextValueFour().".");
                $backfield4->setLabel($task8->getCouponBackFieldLabelFour());
                $structure->addBackField($backfield4);

                $backfield5 = new Field("Textb51", $task8->getCouponBackFieldTextValueFive().".");
                $backfield5->setLabel($task8->getCouponBackFieldLabelFive());
                $structure->addBackField($backfield5);

                $backfield6 = new Field("Textb61", $task8->getCouponBackFieldTextValueSix().".");
                $backfield6->setLabel($task8->getCouponBackFieldLabelSix());
                $structure->addBackField($backfield6);

                $backfield7 = new Field("Textb71", $task8->getCouponBackFieldTextValueSeven().".");
                $backfield7->setLabel($task8->getCouponBackFieldLabelSeven());
                $structure->addBackField($backfield7);

                $backfield8 = new Field("Textb81", $task8->getCouponBackFieldTextValueEight().".");
                $backfield8->setLabel($task8->getCouponBackFieldLabelEight());
                $structure->addBackField($backfield8);
                break;
            case 9:
                $backfield1 = new Field("Textb11", $task8->getCouponBackFieldTextValueOne().".");
                $backfield1->setLabel($task8->getCouponBackFieldLabelOne());
                $structure->addBackField($backfield1);

                $backfield2 = new Field("Textb21", $task8->getCouponBackFieldTextValueTwo().".");
                $backfield2->setLabel($task8->getCouponBackFieldLabelTwo());
                $structure->addBackField($backfield2);

                $backfield3 = new Field("Textb31", $task8->getCouponBackFieldTextValueThree().".");
                $backfield3->setLabel($task8->getCouponBackFieldLabelThree());
                $structure->addBackField($backfield3);

                $backfield4 = new Field("Textb41", $task8->getCouponBackFieldTextValueFour().".");
                $backfield4->setLabel($task8->getCouponBackFieldLabelFour());
                $structure->addBackField($backfield4);

                $backfield5 = new Field("Textb51", $task8->getCouponBackFieldTextValueFive().".");
                $backfield5->setLabel($task8->getCouponBackFieldLabelFive());
                $structure->addBackField($backfield5);

                $backfield6 = new Field("Textb61", $task8->getCouponBackFieldTextValueSix().".");
                $backfield6->setLabel($task8->getCouponBackFieldLabelSix());
                $structure->addBackField($backfield6);

                $backfield7 = new Field("Textb71", $task8->getCouponBackFieldTextValueSeven().".");
                $backfield7->setLabel($task8->getCouponBackFieldLabelSeven());
                $structure->addBackField($backfield7);

                $backfield8 = new Field("Textb81", $task8->getCouponBackFieldTextValueEight().".");
                $backfield8->setLabel($task8->getCouponBackFieldLabelEight());
                $structure->addBackField($backfield8);

                $backfield9 = new Field("Textb91", $task8->getCouponBackFieldTextValueNine().".");
                $backfield9->setLabel($task8->getCouponBackFieldLabelNine());
                $structure->addBackField($backfield9);
                break;
            case 10:
                $backfield1 = new Field("Textb11", $task8->getCouponBackFieldTextValueOne().".");
                $backfield1->setLabel($task8->getCouponBackFieldLabelOne());
                $structure->addBackField($backfield1);

                $backfield2 = new Field("Textb21", $task8->getCouponBackFieldTextValueTwo().".");
                $backfield2->setLabel($task8->getCouponBackFieldLabelTwo());
                $structure->addBackField($backfield2);

                $backfield3 = new Field("Textb31", $task8->getCouponBackFieldTextValueThree().".");
                $backfield3->setLabel($task8->getCouponBackFieldLabelThree());
                $structure->addBackField($backfield3);

                $backfield4 = new Field("Textb41", $task8->getCouponBackFieldTextValueFour().".");
                $backfield4->setLabel($task8->getCouponBackFieldLabelFour());
                $structure->addBackField($backfield4);

                $backfield5 = new Field("Textb51", $task8->getCouponBackFieldTextValueFive().".");
                $backfield5->setLabel($task8->getCouponBackFieldLabelFive());
                $structure->addBackField($backfield5);

                $backfield6 = new Field("Textb61", $task8->getCouponBackFieldTextValueSix().".");
                $backfield6->setLabel($task8->getCouponBackFieldLabelSix());
                $structure->addBackField($backfield6);

                $backfield7 = new Field("Textb71", $task8->getCouponBackFieldTextValueSeven().".");
                $backfield7->setLabel($task8->getCouponBackFieldLabelSeven());
                $structure->addBackField($backfield7);

                $backfield8 = new Field("Textb81", $task8->getCouponBackFieldTextValueEight().".");
                $backfield8->setLabel($task8->getCouponBackFieldLabelEight());
                $structure->addBackField($backfield8);

                $backfield9 = new Field("Textb91", $task8->getCouponBackFieldTextValueNine().".");
                $backfield9->setLabel($task8->getCouponBackFieldLabelNine());
                $structure->addBackField($backfield9);

                $backfield10 = new Field("Textb101", $task8->getCouponBackFieldTextValueTen().".");
                $backfield10->setLabel($task8->getCouponBackFieldLabelTen());
                $structure->addBackField($backfield10);
                break;
        }
        // Add Location

        switch ($task9->getCouponRelevanceLocationTotalFields()) {
            case 0:

                break;
            case 1:
                if($task9->getCouponRelevanceLocationAddressOne()){
                    $lat = $task9->getCouponRelevanceLocationAddressOneLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressOneLongitude();
                    $relevance1 = new Location($lat,$lng);
                    $relevance1->setRelevantText($task9->getCouponRelevanceLocationTextOne());
                    $pass->addLocation($relevance1);
                    //echo $lat." ".$lng;
                }
                break;
            case 2:
                if($task9->getCouponRelevanceLocationAddressOne()){
                    $lat = $task9->getCouponRelevanceLocationAddressOneLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressOneLongitude();
                    $relevance1 = new Location($lat,$lng);
                    $relevance1->setRelevantText($task9->getCouponRelevanceLocationTextOne());
                    $pass->addLocation($relevance1);
                }
                if($task9->getCouponRelevanceLocationAddressTwo()){
                    $lat = $task9->getCouponRelevanceLocationAddressTwoLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressTwoLongitude();
                    $relevance2 = new Location($lat,$lng);
                    $relevance2->setRelevantText($task9->getCouponRelevanceLocationTextTwo());
                    $pass->addLocation($relevance2);
                }

                break;
            case 3:
                if($task9->getCouponRelevanceLocationAddressOne()){
                    $lat = $task9->getCouponRelevanceLocationAddressOneLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressOneLongitude();
                    $relevance1 = new Location($lat,$lng);
                    $relevance1->setRelevantText($task9->getCouponRelevanceLocationTextOne());
                    $pass->addLocation($relevance1);
                }
                if($task9->getCouponRelevanceLocationAddressTwo()){
                    $lat = $task9->getCouponRelevanceLocationAddressTwoLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressTwoLongitude();
                    $relevance2 = new Location($lat,$lng);
                    $relevance2->setRelevantText($task9->getCouponRelevanceLocationTextTwo());
                    $pass->addLocation($relevance2);
                }
                if($task9->getCouponRelevanceLocationAddressThree()){
                    $lat = $task9->getCouponRelevanceLocationAddressThreeLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressThreeLongitude();
                    $relevance3 = new Location($lat,$lng);
                    $relevance3->setRelevantText($task9->getCouponRelevanceLocationTextThree());
                    $pass->addLocation($relevance3);
                }
                break;
            case 4:
                if($task9->getCouponRelevanceLocationAddressOne()){
                    $lat = $task9->getCouponRelevanceLocationAddressOneLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressOneLongitude();
                    $relevance1 = new Location($lat,$lng);
                    $relevance1->setRelevantText($task9->getCouponRelevanceLocationTextOne());
                    $pass->addLocation($relevance1);
                }
                if($task9->getCouponRelevanceLocationAddressTwo()){
                    $lat = $task9->getCouponRelevanceLocationAddressTwoLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressTwoLongitude();
                    $relevance2 = new Location($lat,$lng);
                    $relevance2->setRelevantText($task9->getCouponRelevanceLocationTextTwo());
                    $pass->addLocation($relevance2);
                }
                if($task9->getCouponRelevanceLocationAddressThree()){
                    $lat = $task9->getCouponRelevanceLocationAddressThreeLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressThreeLongitude();
                    $relevance3 = new Location($lat,$lng);
                    $relevance3->setRelevantText($task9->getCouponRelevanceLocationTextThree());
                    $pass->addLocation($relevance3);
                }
                if($task9->getCouponRelevanceLocationAddressFour()){
                    $lat = $task9->getCouponRelevanceLocationAddressFourLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressFourLongitude();
                    $relevance4 = new Location($lat,$lng);
                    $relevance4->setRelevantText($task9->getCouponRelevanceLocationTextFour());
                    $pass->addLocation($relevance4);
                }
                break;
            case 5:
                if($task9->getCouponRelevanceLocationAddressOne()){
                    $lat = $task9->getCouponRelevanceLocationAddressOneLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressOneLongitude();
                    $relevance1 = new Location($lat,$lng);
                    $relevance1->setRelevantText($task9->getCouponRelevanceLocationTextOne());
                    $pass->addLocation($relevance1);
                }
                if($task9->getCouponRelevanceLocationAddressTwo()){
                    $lat = $task9->getCouponRelevanceLocationAddressTwoLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressTwoLongitude();
                    $relevance2 = new Location($lat,$lng);
                    $relevance2->setRelevantText($task9->getCouponRelevanceLocationTextTwo());
                    $pass->addLocation($relevance2);
                }
                if($task9->getCouponRelevanceLocationAddressThree()){
                    $lat = $task9->getCouponRelevanceLocationAddressThreeLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressThreeLongitude();
                    $relevance3 = new Location($lat,$lng);
                    $relevance3->setRelevantText($task9->getCouponRelevanceLocationTextThree());
                    $pass->addLocation($relevance3);
                }
                if($task9->getCouponRelevanceLocationAddressFour()){
                    $lat = $task9->getCouponRelevanceLocationAddressFourLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressFourLongitude();
                    $relevance4 = new Location($lat,$lng);
                    $relevance4->setRelevantText($task9->getCouponRelevanceLocationTextFour());
                    $pass->addLocation($relevance4);
                }
                if($task9->getCouponRelevanceLocationAddressFive()){
                    $lat = $task9->getCouponRelevanceLocationAddressFiveLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressFiveLongitude();
                    $relevance5 = new Location($lat,$lng);
                    $relevance5->setRelevantText($task9->getCouponRelevanceLocationTextFive());
                    $pass->addLocation($relevance5);
                }
                break;
            case 6:
                if($task9->getCouponRelevanceLocationAddressOne()){
                    $lat = $task9->getCouponRelevanceLocationAddressOneLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressOneLongitude();
                    $relevance1 = new Location($lat,$lng);
                    $relevance1->setRelevantText($task9->getCouponRelevanceLocationTextOne());
                    $pass->addLocation($relevance1);
                }
                if($task9->getCouponRelevanceLocationAddressTwo()){
                    $lat = $task9->getCouponRelevanceLocationAddressTwoLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressTwoLongitude();
                    $relevance2 = new Location($lat,$lng);
                    $relevance2->setRelevantText($task9->getCouponRelevanceLocationTextTwo());
                    $pass->addLocation($relevance2);
                }
                if($task9->getCouponRelevanceLocationAddressThree()){
                    $lat = $task9->getCouponRelevanceLocationAddressThreeLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressThreeLongitude();
                    $relevance3 = new Location($lat,$lng);
                    $relevance3->setRelevantText($task9->getCouponRelevanceLocationTextThree());
                    $pass->addLocation($relevance3);
                }
                if($task9->getCouponRelevanceLocationAddressFour()){
                    $lat = $task9->getCouponRelevanceLocationAddressFourLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressFourLongitude();
                    $relevance4 = new Location($lat,$lng);
                    $relevance4->setRelevantText($task9->getCouponRelevanceLocationTextFour());
                    $pass->addLocation($relevance4);
                }
                if($task9->getCouponRelevanceLocationAddressFive()){
                    $lat = $task9->getCouponRelevanceLocationAddressFiveLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressFiveLongitude();
                    $relevance5 = new Location($lat,$lng);
                    $relevance5->setRelevantText($task9->getCouponRelevanceLocationTextFive());
                    $pass->addLocation($relevance5);
                }
                if($task9->getCouponRelevanceLocationAddressSix()){
                    $lat = $task9->getCouponRelevanceLocationAddressSixLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressSixLongitude();
                    $relevance6 = new Location($lat,$lng);
                    $relevance6->setRelevantText($task9->getCouponRelevanceLocationTextSix());
                    $pass->addLocation($relevance6);
                }
                break;
            case 7:
                if($task9->getCouponRelevanceLocationAddressOne()){
                    $lat = $task9->getCouponRelevanceLocationAddressOneLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressOneLongitude();
                    $relevance1 = new Location($lat,$lng);
                    $relevance1->setRelevantText($task9->getCouponRelevanceLocationTextOne());
                    $pass->addLocation($relevance1);
                }
                if($task9->getCouponRelevanceLocationAddressTwo()){
                    $lat = $task9->getCouponRelevanceLocationAddressTwoLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressTwoLongitude();
                    $relevance2 = new Location($lat,$lng);
                    $relevance2->setRelevantText($task9->getCouponRelevanceLocationTextTwo());
                    $pass->addLocation($relevance2);
                }
                if($task9->getCouponRelevanceLocationAddressThree()){
                    $lat = $task9->getCouponRelevanceLocationAddressThreeLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressThreeLongitude();
                    $relevance3 = new Location($lat,$lng);
                    $relevance3->setRelevantText($task9->getCouponRelevanceLocationTextThree());
                    $pass->addLocation($relevance3);
                }
                if($task9->getCouponRelevanceLocationAddressFour()){
                    $lat = $task9->getCouponRelevanceLocationAddressFourLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressFourLongitude();
                    $relevance4 = new Location($lat,$lng);
                    $relevance4->setRelevantText($task9->getCouponRelevanceLocationTextFour());
                    $pass->addLocation($relevance4);
                }
                if($task9->getCouponRelevanceLocationAddressFive()){
                    $lat = $task9->getCouponRelevanceLocationAddressFiveLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressFiveLongitude();
                    $relevance5 = new Location($lat,$lng);
                    $relevance5->setRelevantText($task9->getCouponRelevanceLocationTextFive());
                    $pass->addLocation($relevance5);
                }
                if($task9->getCouponRelevanceLocationAddressSix()){
                    $lat = $task9->getCouponRelevanceLocationAddressSixLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressSixLongitude();
                    $relevance6 = new Location($lat,$lng);
                    $relevance6->setRelevantText($task9->getCouponRelevanceLocationTextSix());
                    $pass->addLocation($relevance6);
                }
                if($task9->getCouponRelevanceLocationAddressSeven()){
                    $lat = $task9->getCouponRelevanceLocationAddressSevenLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressSevenLongitude();
                    $relevance7 = new Location($lat,$lng);
                    $relevance7->setRelevantText($task9->getCouponRelevanceLocationTextSeven());
                    $pass->addLocation($relevance7);
                }
                break;
            case 8:
                if($task9->getCouponRelevanceLocationAddressOne()){
                    $lat = $task9->getCouponRelevanceLocationAddressOneLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressOneLongitude();
                    $relevance1 = new Location($lat,$lng);
                    $relevance1->setRelevantText($task9->getCouponRelevanceLocationTextOne());
                    $pass->addLocation($relevance1);
                }
                if($task9->getCouponRelevanceLocationAddressTwo()){
                    $lat = $task9->getCouponRelevanceLocationAddressTwoLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressTwoLongitude();
                    $relevance2 = new Location($lat,$lng);
                    $relevance2->setRelevantText($task9->getCouponRelevanceLocationTextTwo());
                    $pass->addLocation($relevance2);
                }
                if($task9->getCouponRelevanceLocationAddressThree()){
                    $lat = $task9->getCouponRelevanceLocationAddressThreeLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressThreeLongitude();
                    $relevance3 = new Location($lat,$lng);
                    $relevance3->setRelevantText($task9->getCouponRelevanceLocationTextThree());
                    $pass->addLocation($relevance3);
                }
                if($task9->getCouponRelevanceLocationAddressFour()){
                    $lat = $task9->getCouponRelevanceLocationAddressFourLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressFourLongitude();
                    $relevance4 = new Location($lat,$lng);
                    $relevance4->setRelevantText($task9->getCouponRelevanceLocationTextFour());
                    $pass->addLocation($relevance4);
                }
                if($task9->getCouponRelevanceLocationAddressFive()){
                    $lat = $task9->getCouponRelevanceLocationAddressFiveLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressFiveLongitude();
                    $relevance5 = new Location($lat,$lng);
                    $relevance5->setRelevantText($task9->getCouponRelevanceLocationTextFive());
                    $pass->addLocation($relevance5);
                }
                if($task9->getCouponRelevanceLocationAddressSix()){
                    $lat = $task9->getCouponRelevanceLocationAddressSixLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressSixLongitude();
                    $relevance6 = new Location($lat,$lng);
                    $relevance6->setRelevantText($task9->getCouponRelevanceLocationTextSix());
                    $pass->addLocation($relevance6);
                }
                if($task9->getCouponRelevanceLocationAddressSeven()){
                    $lat = $task9->getCouponRelevanceLocationAddressSevenLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressSevenLongitude();
                    $relevance7 = new Location($lat,$lng);
                    $relevance7->setRelevantText($task9->getCouponRelevanceLocationTextSeven());
                    $pass->addLocation($relevance7);
                }
                if($task9->getCouponRelevanceLocationAddressEight()){
                    $lat = $task9->getCouponRelevanceLocationAddressEightLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressEightLongitude();
                    $relevance8 = new Location($lat,$lng);
                    $relevance8->setRelevantText($task9->getCouponRelevanceLocationTextEight());
                    $pass->addLocation($relevance8);
                }
                break;
            case 9:
                if($task9->getCouponRelevanceLocationAddressOne()){
                    $lat = $task9->getCouponRelevanceLocationAddressOneLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressOneLongitude();
                    $relevance1 = new Location($lat,$lng);
                    $relevance1->setRelevantText($task9->getCouponRelevanceLocationTextOne());
                    $pass->addLocation($relevance1);
                }
                if($task9->getCouponRelevanceLocationAddressTwo()){
                    $lat = $task9->getCouponRelevanceLocationAddressTwoLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressTwoLongitude();
                    $relevance2 = new Location($lat,$lng);
                    $relevance2->setRelevantText($task9->getCouponRelevanceLocationTextTwo());
                    $pass->addLocation($relevance2);
                }
                if($task9->getCouponRelevanceLocationAddressThree()){
                    $lat = $task9->getCouponRelevanceLocationAddressThreeLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressThreeLongitude();
                    $relevance3 = new Location($lat,$lng);
                    $relevance3->setRelevantText($task9->getCouponRelevanceLocationTextThree());
                    $pass->addLocation($relevance3);
                }
                if($task9->getCouponRelevanceLocationAddressFour()){
                    $lat = $task9->getCouponRelevanceLocationAddressFourLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressFourLongitude();
                    $relevance4 = new Location($lat,$lng);
                    $relevance4->setRelevantText($task9->getCouponRelevanceLocationTextFour());
                    $pass->addLocation($relevance4);
                }
                if($task9->getCouponRelevanceLocationAddressFive()){
                    $lat = $task9->getCouponRelevanceLocationAddressFiveLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressFiveLongitude();
                    $relevance5 = new Location($lat,$lng);
                    $relevance5->setRelevantText($task9->getCouponRelevanceLocationTextFive());
                    $pass->addLocation($relevance5);
                }
                if($task9->getCouponRelevanceLocationAddressSix()){
                    $lat = $task9->getCouponRelevanceLocationAddressSixLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressSixLongitude();
                    $relevance6 = new Location($lat,$lng);
                    $relevance6->setRelevantText($task9->getCouponRelevanceLocationTextSix());
                    $pass->addLocation($relevance6);
                }
                if($task9->getCouponRelevanceLocationAddressSeven()){
                    $lat = $task9->getCouponRelevanceLocationAddressSevenLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressSevenLongitude();
                    $relevance7 = new Location($lat,$lng);
                    $relevance7->setRelevantText($task9->getCouponRelevanceLocationTextSeven());
                    $pass->addLocation($relevance7);
                }
                if($task9->getCouponRelevanceLocationAddressEight()){
                    $lat = $task9->getCouponRelevanceLocationAddressEightLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressEightLongitude();
                    $relevance8 = new Location($lat,$lng);
                    $relevance8->setRelevantText($task9->getCouponRelevanceLocationTextEight());
                    $pass->addLocation($relevance8);
                }
                if($task9->getCouponRelevanceLocationAddressNine()){
                    $lat = $task9->getCouponRelevanceLocationAddressNineLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressNineLongitude();
                    $relevance9 = new Location($lat,$lng);
                    $relevance9->setRelevantText($task9->getCouponRelevanceLocationTextNine());
                    $pass->addLocation($relevance9);
                }
                break;
            case 10:
                if($task9->getCouponRelevanceLocationAddressOne()){
                    $lat = $task9->getCouponRelevanceLocationAddressOneLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressOneLongitude();
                    $relevance1 = new Location($lat,$lng);
                    $relevance1->setRelevantText($task9->getCouponRelevanceLocationTextOne());
                    $pass->addLocation($relevance1);
                }
                if($task9->getCouponRelevanceLocationAddressTwo()){
                    $lat = $task9->getCouponRelevanceLocationAddressTwoLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressTwoLongitude();
                    $relevance2 = new Location($lat,$lng);
                    $relevance2->setRelevantText($task9->getCouponRelevanceLocationTextTwo());
                    $pass->addLocation($relevance2);
                }
                if($task9->getCouponRelevanceLocationAddressThree()){
                    $lat = $task9->getCouponRelevanceLocationAddressThreeLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressThreeLongitude();
                    $relevance3 = new Location($lat,$lng);
                    $relevance3->setRelevantText($task9->getCouponRelevanceLocationTextThree());
                    $pass->addLocation($relevance3);
                }
                if($task9->getCouponRelevanceLocationAddressFour()){
                    $lat = $task9->getCouponRelevanceLocationAddressFourLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressFourLongitude();
                    $relevance4 = new Location($lat,$lng);
                    $relevance4->setRelevantText($task9->getCouponRelevanceLocationTextFour());
                    $pass->addLocation($relevance4);
                }
                if($task9->getCouponRelevanceLocationAddressFive()){
                    $lat = $task9->getCouponRelevanceLocationAddressFiveLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressFiveLongitude();
                    $relevance5 = new Location($lat,$lng);
                    $relevance5->setRelevantText($task9->getCouponRelevanceLocationTextFive());
                    $pass->addLocation($relevance5);
                }
                if($task9->getCouponRelevanceLocationAddressSix()){
                    $lat = $task9->getCouponRelevanceLocationAddressSixLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressSixLongitude();
                    $relevance6 = new Location($lat,$lng);
                    $relevance6->setRelevantText($task9->getCouponRelevanceLocationTextSix());
                    $pass->addLocation($relevance6);
                }
                if($task9->getCouponRelevanceLocationAddressSeven()){
                    $lat = $task9->getCouponRelevanceLocationAddressSevenLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressSevenLongitude();
                    $relevance7 = new Location($lat,$lng);
                    $relevance7->setRelevantText($task9->getCouponRelevanceLocationTextSeven());
                    $pass->addLocation($relevance7);
                }
                if($task9->getCouponRelevanceLocationAddressEight()){
                    $lat = $task9->getCouponRelevanceLocationAddressEightLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressEightLongitude();
                    $relevance8 = new Location($lat,$lng);
                    $relevance8->setRelevantText($task9->getCouponRelevanceLocationTextEight());
                    $pass->addLocation($relevance8);
                }
                if($task9->getCouponRelevanceLocationAddressNine()){
                    $lat = $task9->getCouponRelevanceLocationAddressNineLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressNineLongitude();
                    $relevance9 = new Location($lat,$lng);
                    $relevance9->setRelevantText($task9->getCouponRelevanceLocationTextNine());
                    $pass->addLocation($relevance9);
                }
                if($task9->getCouponRelevanceLocationAddressTen()){
                    $lat = $task9->getCouponRelevanceLocationAddressTenLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressTenLongitude();
                    $relevance10 = new Location($lat,$lng);
                    $relevance10->setRelevantText($task9->getCouponRelevanceLocationTextTen());
                    $pass->addLocation($relevance10);
                }
                break;
        }
        $pass->setRelevantDate(new \DateTime('tomorrow'));
        // Set pass structure
        $pass->setStructure($structure);

        // Add barcode
        switch($barcodestatus){
            case "hide":
                break;

            case "show":
                if($task3->getCouponBarcodeType()=="PDF417")
                {
                    $barcode = new Barcode(Barcode::TYPE_PDF_417, $task3->getCouponAutoGenerateValue(),'iso-8859-1');
                    $pass->setBarcode($barcode);
                }
                else if($task3->getCouponBarcodeType()=="Aztec")
                {
                    $barcode = new Barcode(Barcode::TYPE_AZTEC, $task3->getCouponAutoGenerateValue(),'iso-8859-1');
                    $pass->setBarcode($barcode);
                }
                else if($task3->getCouponBarcodeType()=="QRCode")
                {
                    $barcode = new Barcode(Barcode::TYPE_QR,$task3->getCouponAutoGenerateValue(),'iso-8859-1');
                    // $barcode->setAltText('me');
                    $pass->setBarcode($barcode);
                }
                else{
                    //
                }

                $barcode->setAltText($task3->getCouponAutoGenerateValue());
                break;
        }

        // Create pass factory instance
        $factory->setOutputPath($root.'/logs/pkpass');
        $factory->package($pass);
        return $id;

    }
    public function setStatusAction($ids , $check)
    {
        $em = $this->getDoctrine()->getManager();
        $task= $em->getRepository('apbappassBundle:mdistribution')->findOneBy(array('couponId' => $ids));
        if ($check == 1){
            $task->setDistributionStatus(0);
        }
        else{
            $task->setDistributionStatus(1);
        }
        $em->persist($task);
        $em->flush();
        return $this->redirect($this->generateUrl('apb_appass_manage'));
    }
    public function replicateAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $passid = sha1(uniqid(mt_rand(),true));
        $generalid = md5(uniqid(mt_rand(),true));


        $task11 = $em->getRepository('apbappassBundle:mgeneral')->findOneBy(array('couponId' => $id));
        $task22 = $em->getRepository('apbappassBundle:mappearance')->findOneBy(array('couponId' => $id));
        $task33 = $em->getRepository('apbappassBundle:mdatasetting')->findOneBy(array('couponId' => $id));
        $task44 = $em->getRepository('apbappassBundle:mheader')->findOneBy(array('couponId' => $id));
        $task55 = $em->getRepository('apbappassBundle:mprimary')->findOneBy(array('couponId' => $id));
        $task66 = $em->getRepository('apbappassBundle:msecondary')->findOneBy(array('couponId' => $id));
        $task77 = $em->getRepository('apbappassBundle:mauxiliary')->findOneBy(array('couponId' => $id));
        $task88 = $em->getRepository('apbappassBundle:mbackfields')->findOneBy(array('couponId' => $id));
        $task99 = $em->getRepository('apbappassBundle:mrelevance')->findOneBy(array('couponId' => $id));
        $task110 = $em->getRepository('apbappassBundle:mdistribution')->findOneBy(array('couponId' => $id));

        $iconid = $task22->getId();
        $task1 = new mgeneral();
        $task2 = new mappearance();
        $task3 = new mdatasetting();
        $task4 = new mheader();
        $task5 = new mprimary();
        $task6 = new msecondary();
        $task7 = new mauxiliary();
        $task8 = new mbackfields();
        $task9 = new mrelevance();
        $task10 = new mdistribution();

        $task1->setTemplateName($task11->getTemplateName()."-copy");
        $task1->setCouponId($generalid);
        $task1->setPassKey($passid);
        $task1->setCategoryName($task11->getCategoryName());
        $task1->setPlaces($task11->getPlaces());
        $task1->setBoardingPassTransit($task11->getBoardingPassTransit());
        $task1->setOrganizationName($task11->getOrganizationName());
        $task1->setOrganizationDescription($task11->getOrganizationDescription());
        $task1->setClientId($task11->getClientId());
        $task1->setUserId($task11->getUserId());
        $em->persist($task1);

        $task2->setCouponId($generalid);
        $task2->setIconName($task22->getIconName());
        $task2->setLogoName($task22->getLogoName());
        $task2->setLogoText($task22->getLogoText());
        $task2->setGenericThumbnail($task22->getGenericThumbnail());
        $task2->setBoardingPassFooter($task22->getBoardingPassFooter());
        $task2->setCouponStrip($task22->getCouponStrip());
        $task2->setStoreCardStrip($task22->getStoreCardStrip());
        $task2->setEventTicketStatus($task22->getEventTicketStatus());
        $task2->setEventTicketStrip($task22->getEventTicketStrip());
        $task2->setEventTicketThumbnail($task22->getEventTicketThumbnail());
        $task2->setEventTicketBackground($task22->getEventTicketBackground());
        $task2->setBackgroundColorCode($task22->getBackgroundColorCode());
        $task2->setFieldLabelColorCode($task22->getFieldLabelColorCode());
        $task2->setFieldValueColorCode($task22->getFieldValueColorCode());
        $em->persist($task2);

        $task3->setCouponId($generalid);
        $task3->setCouponBarcodeStatus($task33->getCouponBarcodeStatus());
        $task3->setCouponBarcodeType($task33->getCouponBarcodeType());
        $task3->setCouponBarcodeValueOption($task33->getCouponBarcodeValueOption());
        $task3->setCouponBarcodeFixedValue($task33->getCouponBarcodeFixedValue());
        $task3->setCouponBarcodeValueSource($task33->getCouponBarcodeValueSource());
        $task3->setCouponAutoGenerateValueType($task33->getCouponAutoGenerateValueType());
        $task3->setCouponAutoGenerateValueLength($task33->getCouponAutoGenerateValueLength());
        $task3->setCouponAutoGenerateValue($task33->getCouponAutoGenerateValue());
        $task3->setCouponBarcodeDynamicValue($task33->getCouponBarcodeDynamicValue());
        $task3->setCouponBarcodeEncoding($task33->getCouponBarcodeEncoding());
        $task3->setBarcodeAlternateText($task33->getBarcodeAlternateText());
        $task3->setBarcodeAlternateFixedText($task33->getBarcodeAlternateFixedText());
        $task3->setBarcodeAlternateDynamicText($task33->getBarcodeAlternateDynamicText());
        $em->persist($task3);

        $task4->setCouponId($generalid);
        $task4->setCouponHeaderLabel($task44->getCouponHeaderLabel());
        $task4->setCouponHeaderLabelDynamicStatus($task44->getCouponHeaderLabelDynamicStatus());
        $task4->setCouponHeaderValueType($task44->getCouponHeaderValueType());
        $task4->setCouponHeaderTextValue($task44->getCouponHeaderTextValue());
        $task4->setCouponHeaderTextDynamicStatus($task44->getCouponHeaderTextDynamicStatus());
        $task4->setCouponHeaderValueDate($task44->getCouponHeaderValueDate());
        $task4->setCouponHeaderValueTime($task44->getCouponHeaderValueTime());
        $task4->setCouponHeaderValueTimezone($task44->getCouponHeaderValueTimezone());
        $task4->setCouponHeaderValueDateFormate($task44->getCouponHeaderValueDateFormate());
        $task4->setCouponHeaderValueTimeFormate($task44->getCouponHeaderValueTimeFormate());
        $task4->setCouponHeaderNumberValue($task44->getCouponHeaderNumberValue());
        $task4->setCouponHeaderNumberFormate($task44->getCouponHeaderNumberFormate());
        $task4->setCouponHeaderCurrencyValue($task44->getCouponHeaderCurrencyValue());
        $task4->setCouponHeaderCurrencyCode($task44->getCouponHeaderCurrencyCode());
        $task4->setCouponHeaderAlignmnet($task44->getCouponHeaderAlignmnet());
        $em->persist($task4);

        $task5->setCouponId($generalid);
        $task5->setCouponPrimaryFieldLabel($task55->getCouponPrimaryFieldLabel());
        $task5->setCouponPrimaryFieldLabelDynamicStatus($task55->getCouponPrimaryFieldLabelDynamicStatus());
        $task5->setCouponPrimaryFieldValueType($task55->getCouponPrimaryFieldValueType());
        $task5->setCouponPrimaryFieldTextValue($task55->getCouponPrimaryFieldTextValue());
        $task5->setCouponPrimaryFieldTextDynamicStatus($task55->getCouponPrimaryFieldTextDynamicStatus());
        $task5->setCouponPrimaryFieldValueDate($task55->getCouponPrimaryFieldValueDate());
        $task5->setCouponPrimaryFieldValueTime($task55->getCouponPrimaryFieldValueTime());
        $task5->setCouponPrimaryFieldValueTimezone($task55->getCouponPrimaryFieldValueTimezone());
        $task5->setCouponPrimaryFieldValueDateFormate($task55->getCouponPrimaryFieldValueDateFormate());
        $task5->setCouponPrimaryFieldValueTimeFormate($task55->getCouponPrimaryFieldValueTimeFormate());
        $task5->setCouponPrimaryFieldNumberValue($task55->getCouponPrimaryFieldNumberValue());
        $task5->setCouponPrimaryFieldNumberFormate($task55->getCouponPrimaryFieldNumberFormate());
        $task5->setCouponPrimaryFieldCurrencyValue($task55->getCouponPrimaryFieldCurrencyValue());
        $task5->setCouponPrimaryFieldCurrencyCode($task55->getCouponPrimaryFieldCurrencyCode());
        $em->persist($task5);

        $task6->setCouponId($generalid);
        $task6->setCouponSecondaryFieldTotalFields($task66->getCouponSecondaryFieldTotalFields());

        $task6->setCouponSecondaryFieldLabelOne($task66->getCouponSecondaryFieldLabelOne());
        $task6->setCouponSecondaryFieldLabelDynamicStatusOne($task66->getCouponSecondaryFieldLabelDynamicStatusOne());
        $task6->setCouponSecondaryFieldValueTypeOne($task66->getCouponSecondaryFieldValueTypeOne());
        $task6->setCouponSecondaryFieldTextValueOne($task66->getCouponSecondaryFieldTextValueOne());
        $task6->setCouponSecondaryFieldTextDynamicStatusOne($task66->getCouponSecondaryFieldTextDynamicStatusOne());
        $task6->setCouponSecondaryFieldValueDateOne($task66->getCouponSecondaryFieldValueDateOne());
        $task6->setCouponSecondaryFieldValueTimeOne($task66->getCouponSecondaryFieldValueTimeOne());
        $task6->setCouponSecondaryFieldValueTimezoneOne($task66->getCouponSecondaryFieldValueTimezoneOne());
        $task6->setCouponSecondaryFieldValueDateFormateOne($task66->getCouponSecondaryFieldValueDateFormateOne());
        $task6->setCouponSecondaryFieldValueTimeFormateOne($task66->getCouponSecondaryFieldValueTimeFormateOne());
        $task6->setCouponSecondaryFieldNumberValueOne($task66->getCouponSecondaryFieldNumberValueOne());
        $task6->setCouponSecondaryFieldNumberFormateOne($task66->getCouponSecondaryFieldNumberFormateOne());
        $task6->setCouponSecondaryFieldCurrencyValueOne($task66->getCouponSecondaryFieldCurrencyValueOne());
        $task6->setCouponSecondaryFieldCurrencyCodeOne($task66->getCouponSecondaryFieldCurrencyCodeOne());
        $task6->setCouponSecondaryFieldAlignmnetOne($task66->getCouponSecondaryFieldAlignmnetOne());

        $task6->setCouponSecondaryFieldLabelTwo($task66->getCouponSecondaryFieldLabelTwo());
        $task6->setCouponSecondaryFieldLabelDynamicStatusTwo($task66->getCouponSecondaryFieldLabelDynamicStatusTwo());
        $task6->setCouponSecondaryFieldValueTypeTwo($task66->getCouponSecondaryFieldValueTypeTwo());
        $task6->setCouponSecondaryFieldTextValueTwo($task66->getCouponSecondaryFieldTextValueTwo());
        $task6->setCouponSecondaryFieldTextDynamicStatusTwo($task66->getCouponSecondaryFieldTextDynamicStatusTwo());
        $task6->setCouponSecondaryFieldValueDateTwo($task66->getCouponSecondaryFieldValueDateTwo());
        $task6->setCouponSecondaryFieldValueTimeTwo($task66->getCouponSecondaryFieldValueTimeTwo());
        $task6->setCouponSecondaryFieldValueTimezoneTwo($task66->getCouponSecondaryFieldValueTimezoneTwo());
        $task6->setCouponSecondaryFieldValueDateFormateTwo($task66->getCouponSecondaryFieldValueDateFormateTwo());
        $task6->setCouponSecondaryFieldValueTimeFormateTwo($task66->getCouponSecondaryFieldValueTimeFormateTwo());
        $task6->setCouponSecondaryFieldNumberValueTwo($task66->getCouponSecondaryFieldNumberValueTwo());
        $task6->setCouponSecondaryFieldNumberFormateTwo($task66->getCouponSecondaryFieldNumberFormateTwo());
        $task6->setCouponSecondaryFieldCurrencyValueTwo($task66->getCouponSecondaryFieldCurrencyValueTwo());
        $task6->setCouponSecondaryFieldCurrencyCodeTwo($task66->getCouponSecondaryFieldCurrencyCodeTwo());
        $task6->setCouponSecondaryFieldAlignmnetTwo($task66->getCouponSecondaryFieldAlignmnetTwo());

        $task6->setCouponSecondaryFieldLabelThree($task66->getCouponSecondaryFieldLabelThree());
        $task6->setCouponSecondaryFieldLabelDynamicStatusThree($task66->getCouponSecondaryFieldLabelDynamicStatusThree());
        $task6->setCouponSecondaryFieldValueTypeThree($task66->getCouponSecondaryFieldValueTypeThree());
        $task6->setCouponSecondaryFieldTextValueThree($task66->getCouponSecondaryFieldTextValueThree());
        $task6->setCouponSecondaryFieldTextDynamicStatusThree($task66->getCouponSecondaryFieldTextDynamicStatusThree());
        $task6->setCouponSecondaryFieldValueDateThree($task66->getCouponSecondaryFieldValueDateThree());
        $task6->setCouponSecondaryFieldValueTimeThree($task66->getCouponSecondaryFieldValueTimeThree());
        $task6->setCouponSecondaryFieldValueTimezoneThree($task66->getCouponSecondaryFieldValueTimezoneThree());
        $task6->setCouponSecondaryFieldValueDateFormateThree($task66->getCouponSecondaryFieldValueDateFormateThree());
        $task6->setCouponSecondaryFieldValueTimeFormateThree($task66->getCouponSecondaryFieldValueTimeFormateThree());
        $task6->setCouponSecondaryFieldNumberValueThree($task66->getCouponSecondaryFieldNumberValueThree());
        $task6->setCouponSecondaryFieldNumberFormateThree($task66->getCouponSecondaryFieldNumberFormateThree());
        $task6->setCouponSecondaryFieldCurrencyValueThree($task66->getCouponSecondaryFieldCurrencyValueThree());
        $task6->setCouponSecondaryFieldCurrencyCodeThree($task66->getCouponSecondaryFieldCurrencyCodeThree());
        $task6->setCouponSecondaryFieldAlignmnetThree($task66->getCouponSecondaryFieldAlignmnetThree());

        $task6->setCouponSecondaryFieldLabelFour($task66->getCouponSecondaryFieldLabelFour());
        $task6->setCouponSecondaryFieldLabelDynamicStatusFour($task66->getCouponSecondaryFieldLabelDynamicStatusFour());
        $task6->setCouponSecondaryFieldValueTypeFour($task66->getCouponSecondaryFieldValueTypeFour());
        $task6->setCouponSecondaryFieldTextValueFour($task66->getCouponSecondaryFieldTextValueFour());
        $task6->setCouponSecondaryFieldTextDynamicStatusFour($task66->getCouponSecondaryFieldTextDynamicStatusFour());
        $task6->setCouponSecondaryFieldValueDateFour($task66->getCouponSecondaryFieldValueDateFour());
        $task6->setCouponSecondaryFieldValueTimeFour($task66->getCouponSecondaryFieldValueTimeFour());
        $task6->setCouponSecondaryFieldValueTimezoneFour($task66->getCouponSecondaryFieldValueTimezoneFour());
        $task6->setCouponSecondaryFieldValueDateFormateFour($task66->getCouponSecondaryFieldValueDateFormateFour());
        $task6->setCouponSecondaryFieldValueTimeFormateFour($task66->getCouponSecondaryFieldValueTimeFormateFour());
        $task6->setCouponSecondaryFieldNumberValueFour($task66->getCouponSecondaryFieldNumberValueFour());
        $task6->setCouponSecondaryFieldNumberFormateFour($task66->getCouponSecondaryFieldNumberFormateFour());
        $task6->setCouponSecondaryFieldCurrencyValueFour($task66->getCouponSecondaryFieldCurrencyValueFour());
        $task6->setCouponSecondaryFieldCurrencyCodeFour($task66->getCouponSecondaryFieldCurrencyCodeFour());
        $task6->setCouponSecondaryFieldAlignmnetFour($task66->getCouponSecondaryFieldAlignmnetFour());

        $em->persist($task6);
        $task7->setCouponId($generalid);

        $task7->setCouponAuxiliaryFieldTotalFields($task77->getCouponAuxiliaryFieldTotalFields());

        $task7->setCouponAuxiliaryFieldLabelOne($task77->getCouponAuxiliaryFieldLabelOne());
        $task7->setCouponAuxiliaryFieldLabelDynamicStatusOne($task77->getCouponAuxiliaryFieldLabelDynamicStatusOne());
        $task7->setCouponAuxiliaryFieldValueTypeOne($task77->getCouponAuxiliaryFieldValueTypeOne());
        $task7->setCouponAuxiliaryFieldTextValueOne($task77->getCouponAuxiliaryFieldTextValueOne());
        $task7->setCouponAuxiliaryFieldTextDynamicStatusOne($task77->getCouponAuxiliaryFieldTextDynamicStatusOne());
        $task7->setCouponAuxiliaryFieldValueDateOne($task77->getCouponAuxiliaryFieldValueDateOne());
        $task7->setCouponAuxiliaryFieldValueTimeOne($task77->getCouponAuxiliaryFieldValueTimeOne());
        $task7->setCouponAuxiliaryFieldValueTimezoneOne($task77->getCouponAuxiliaryFieldValueTimezoneOne());
        $task7->setCouponAuxiliaryFieldValueDateFormateOne($task77->getCouponAuxiliaryFieldValueDateFormateOne());
        $task7->setCouponAuxiliaryFieldValueTimeFormateOne($task77->getCouponAuxiliaryFieldValueTimeFormateOne());
        $task7->setCouponAuxiliaryFieldNumberValueOne($task77->getCouponAuxiliaryFieldNumberValueOne());
        $task7->setCouponAuxiliaryFieldNumberFormateOne($task77->getCouponAuxiliaryFieldNumberFormateOne());
        $task7->setCouponAuxiliaryFieldCurrencyValueOne($task77->getCouponAuxiliaryFieldCurrencyValueOne());
        $task7->setCouponAuxiliaryFieldCurrencyCodeOne($task77->getCouponAuxiliaryFieldCurrencyCodeOne());
        $task7->setCouponAuxiliaryFieldAlignmnetOne($task77->getCouponAuxiliaryFieldAlignmnetOne());

        $task7->setCouponAuxiliaryFieldLabelTwo($task77->getCouponAuxiliaryFieldLabelTwo());
        $task7->setCouponAuxiliaryFieldLabelDynamicStatusTwo($task77->getCouponAuxiliaryFieldLabelDynamicStatusTwo());
        $task7->setCouponAuxiliaryFieldValueTypeTwo($task77->getCouponAuxiliaryFieldValueTypeTwo());
        $task7->setCouponAuxiliaryFieldTextValueTwo($task77->getCouponAuxiliaryFieldTextValueTwo());
        $task7->setCouponAuxiliaryFieldTextDynamicStatusTwo($task77->getCouponAuxiliaryFieldTextDynamicStatusTwo());
        $task7->setCouponAuxiliaryFieldValueDateTwo($task77->getCouponAuxiliaryFieldValueDateTwo());
        $task7->setCouponAuxiliaryFieldValueTimeTwo($task77->getCouponAuxiliaryFieldValueTimeTwo());
        $task7->setCouponAuxiliaryFieldValueTimezoneTwo($task77->getCouponAuxiliaryFieldValueTimezoneTwo());
        $task7->setCouponAuxiliaryFieldValueDateFormateTwo($task77->getCouponAuxiliaryFieldValueDateFormateTwo());
        $task7->setCouponAuxiliaryFieldValueTimeFormateTwo($task77->getCouponAuxiliaryFieldValueTimeFormateTwo());
        $task7->setCouponAuxiliaryFieldNumberValueTwo($task77->getCouponAuxiliaryFieldNumberValueTwo());
        $task7->setCouponAuxiliaryFieldNumberFormateTwo($task77->getCouponAuxiliaryFieldNumberFormateTwo());
        $task7->setCouponAuxiliaryFieldCurrencyValueTwo($task77->getCouponAuxiliaryFieldCurrencyValueTwo());
        $task7->setCouponAuxiliaryFieldCurrencyCodeTwo($task77->getCouponAuxiliaryFieldCurrencyCodeTwo());
        $task7->setCouponAuxiliaryFieldAlignmnetTwo($task77->getCouponAuxiliaryFieldAlignmnetTwo());

        $task7->setCouponAuxiliaryFieldLabelThree($task77->getCouponAuxiliaryFieldLabelThree());
        $task7->setCouponAuxiliaryFieldLabelDynamicStatusThree($task77->getCouponAuxiliaryFieldLabelDynamicStatusThree());
        $task7->setCouponAuxiliaryFieldValueTypeThree($task77->getCouponAuxiliaryFieldValueTypeThree());
        $task7->setCouponAuxiliaryFieldTextValueThree($task77->getCouponAuxiliaryFieldTextValueThree());
        $task7->setCouponAuxiliaryFieldTextDynamicStatusThree($task77->getCouponAuxiliaryFieldTextDynamicStatusThree());
        $task7->setCouponAuxiliaryFieldValueDateThree($task77->getCouponAuxiliaryFieldValueDateThree());
        $task7->setCouponAuxiliaryFieldValueTimeThree($task77->getCouponAuxiliaryFieldValueTimeThree());
        $task7->setCouponAuxiliaryFieldValueTimezoneThree($task77->getCouponAuxiliaryFieldValueTimezoneThree());
        $task7->setCouponAuxiliaryFieldValueDateFormateThree($task77->getCouponAuxiliaryFieldValueDateFormateThree());
        $task7->setCouponAuxiliaryFieldValueTimeFormateThree($task77->getCouponAuxiliaryFieldValueTimeFormateThree());
        $task7->setCouponAuxiliaryFieldNumberValueThree($task77->getCouponAuxiliaryFieldNumberValueThree());
        $task7->setCouponAuxiliaryFieldNumberFormateThree($task77->getCouponAuxiliaryFieldNumberFormateThree());
        $task7->setCouponAuxiliaryFieldCurrencyValueThree($task77->getCouponAuxiliaryFieldCurrencyValueThree());
        $task7->setCouponAuxiliaryFieldCurrencyCodeThree($task77->getCouponAuxiliaryFieldCurrencyCodeThree());
        $task7->setCouponAuxiliaryFieldAlignmnetThree($task77->getCouponAuxiliaryFieldAlignmnetThree());

        $task7->setCouponAuxiliaryFieldLabelFour($task77->getCouponAuxiliaryFieldLabelFour());
        $task7->setCouponAuxiliaryFieldLabelDynamicStatusFour($task77->getCouponAuxiliaryFieldLabelDynamicStatusFour());
        $task7->setCouponAuxiliaryFieldValueTypeFour($task77->getCouponAuxiliaryFieldValueTypeFour());
        $task7->setCouponAuxiliaryFieldTextValueFour($task77->getCouponAuxiliaryFieldTextValueFour());
        $task7->setCouponAuxiliaryFieldTextDynamicStatusFour($task77->getCouponAuxiliaryFieldTextDynamicStatusFour());
        $task7->setCouponAuxiliaryFieldValueDateFour($task77->getCouponAuxiliaryFieldValueDateFour());
        $task7->setCouponAuxiliaryFieldValueTimeFour($task77->getCouponAuxiliaryFieldValueTimeFour());
        $task7->setCouponAuxiliaryFieldValueTimezoneFour($task77->getCouponAuxiliaryFieldValueTimezoneFour());
        $task7->setCouponAuxiliaryFieldValueDateFormateFour($task77->getCouponAuxiliaryFieldValueDateFormateFour());
        $task7->setCouponAuxiliaryFieldValueTimeFormateFour($task77->getCouponAuxiliaryFieldValueTimeFormateFour());
        $task7->setCouponAuxiliaryFieldNumberValueFour($task77->getCouponAuxiliaryFieldNumberValueFour());
        $task7->setCouponAuxiliaryFieldNumberFormateFour($task77->getCouponAuxiliaryFieldNumberFormateFour());
        $task7->setCouponAuxiliaryFieldCurrencyValueFour($task77->getCouponAuxiliaryFieldCurrencyValueFour());
        $task7->setCouponAuxiliaryFieldCurrencyCodeFour($task77->getCouponAuxiliaryFieldCurrencyCodeFour());
        $task7->setCouponAuxiliaryFieldAlignmnetFour($task77->getCouponAuxiliaryFieldAlignmnetFour());
        $em->persist($task7);

        $task8->setCouponId($generalid);
        $task8->setCouponBackFieldTotalFields($task88->getCouponBackFieldTotalFields());
        $task8->setCouponBackFieldLabelOne($task88->getCouponBackFieldLabelOne());
        $task8->setCouponBackFieldLabelDynamicStatusOne($task88->getCouponBackFieldLabelDynamicStatusOne());
        $task8->setCouponBackFieldTextValueOne($task88->getCouponBackFieldTextValueOne());
        $task8->setCouponBackFieldTextDynamicStatusOne($task88->getCouponBackFieldTextDynamicStatusOne());
        $task8->setCouponBackFieldLabelTwo($task88->getCouponBackFieldLabelTwo());
        $task8->setCouponBackFieldLabelDynamicStatusTwo($task88->getCouponBackFieldLabelDynamicStatusTwo());
        $task8->setCouponBackFieldTextValueTwo($task88->getCouponBackFieldTextValueTwo());
        $task8->setCouponBackFieldTextDynamicStatusTwo($task88->getCouponBackFieldTextDynamicStatusTwo());
        $task8->setCouponBackFieldLabelThree($task88->getCouponBackFieldLabelThree());
        $task8->setCouponBackFieldLabelDynamicStatusThree($task88->getCouponBackFieldLabelDynamicStatusThree());
        $task8->setCouponBackFieldTextValueThree($task88->getCouponBackFieldTextValueThree());
        $task8->setCouponBackFieldTextDynamicStatusThree($task88->getCouponBackFieldTextDynamicStatusThree());
        $task8->setCouponBackFieldLabelFour($task88->getCouponBackFieldLabelFour());
        $task8->setCouponBackFieldLabelDynamicStatusFour($task88->getCouponBackFieldLabelDynamicStatusFour());
        $task8->setCouponBackFieldTextValueFour($task88->getCouponBackFieldTextValueFour());
        $task8->setCouponBackFieldTextDynamicStatusFour($task88->getCouponBackFieldTextDynamicStatusFour());
        $task8->setCouponBackFieldLabelFive($task88->getCouponBackFieldLabelFive());
        $task8->setCouponBackFieldLabelDynamicStatusFive($task88->getCouponBackFieldLabelDynamicStatusFive());
        $task8->setCouponBackFieldTextValueFive($task88->getCouponBackFieldTextValueFive());
        $task8->setCouponBackFieldTextDynamicStatusFive($task88->getCouponBackFieldTextDynamicStatusFive());
        $task8->setCouponBackFieldLabelSix($task88->getCouponBackFieldLabelSix());
        $task8->setCouponBackFieldLabelDynamicStatusSix($task88->getCouponBackFieldLabelDynamicStatusSix());
        $task8->setCouponBackFieldTextValueSix($task88->getCouponBackFieldTextValueSix());
        $task8->setCouponBackFieldTextDynamicStatusSix($task88->getCouponBackFieldTextDynamicStatusSix());
        $task8->setCouponBackFieldLabelSeven($task88->getCouponBackFieldLabelSeven());
        $task8->setCouponBackFieldLabelDynamicStatusSeven($task88->getCouponBackFieldLabelDynamicStatusSeven());
        $task8->setCouponBackFieldTextValueSeven($task88->getCouponBackFieldTextValueSeven());
        $task8->setCouponBackFieldTextDynamicStatusSeven($task88->getCouponBackFieldTextDynamicStatusSeven());
        $task8->setCouponBackFieldLabelEight($task88->getCouponBackFieldLabelEight());
        $task8->setCouponBackFieldLabelDynamicStatusEight($task88->getCouponBackFieldLabelDynamicStatusEight());
        $task8->setCouponBackFieldTextValueEight($task88->getCouponBackFieldTextValueEight());
        $task8->setCouponBackFieldTextDynamicStatusEight($task88->getCouponBackFieldTextDynamicStatusEight());
        $task8->setCouponBackFieldLabelNine($task88->getCouponBackFieldLabelNine());
        $task8->setCouponBackFieldLabelDynamicStatusNine($task88->getCouponBackFieldLabelDynamicStatusNine());
        $task8->setCouponBackFieldTextValueNine($task88->getCouponBackFieldTextValueNine());
        $task8->setCouponBackFieldTextDynamicStatusNine($task88->getCouponBackFieldTextDynamicStatusNine());
        $task8->setCouponBackFieldLabelTen($task88->getCouponBackFieldLabelTen());
        $task8->setCouponBackFieldLabelDynamicStatusTen($task88->getCouponBackFieldLabelDynamicStatusTen());
        $task8->setCouponBackFieldTextValueTen($task88->getCouponBackFieldTextValueTen());
        $task8->setCouponBackFieldTextDynamicStatusTen($task88->getCouponBackFieldTextDynamicStatusTen());
        $em->persist($task8);

        $task9->setCouponId($generalid);
        $task9->setCouponRelevanceLocationTotalFields($task99->getCouponRelevanceLocationTotalFields());
        $task9->setCouponRelevanceLocationAddressOne($task99->getCouponRelevanceLocationAddressOne());
        $task9->setCouponRelevanceLocationTextOne($task99->getCouponRelevanceLocationTextOne());
        $task9->setCouponRelevanceLocationTextDynamicStatusOne($task99->getCouponRelevanceLocationTextDynamicStatusOne());
        $task9->setCouponRelevanceLocationAddressTwo($task99->getCouponRelevanceLocationAddressTwo());
        $task9->setCouponRelevanceLocationTextTwo($task99->getCouponRelevanceLocationTextTwo());
        $task9->setCouponRelevanceLocationTextDynamicStatusTwo($task99->getCouponRelevanceLocationTextDynamicStatusTwo());
        $task9->setCouponRelevanceLocationAddressThree($task99->getCouponRelevanceLocationAddressThree());
        $task9->setCouponRelevanceLocationTextThree($task99->getCouponRelevanceLocationTextThree());
        $task9->setCouponRelevanceLocationTextDynamicStatusThree($task99->getCouponRelevanceLocationTextDynamicStatusThree());
        $task9->setCouponRelevanceLocationAddressFour($task99->getCouponRelevanceLocationAddressFour());
        $task9->setCouponRelevanceLocationTextFour($task99->getCouponRelevanceLocationTextFour());
        $task9->setCouponRelevanceLocationTextDynamicStatusFour($task99->getCouponRelevanceLocationTextDynamicStatusFour());
        $task9->setCouponRelevanceLocationAddressFive($task99->getCouponRelevanceLocationAddressFive());
        $task9->setCouponRelevanceLocationTextFive($task99->getCouponRelevanceLocationTextFive());
        $task9->setCouponRelevanceLocationTextDynamicStatusFive($task99->getCouponRelevanceLocationTextDynamicStatusFive());
        $task9->setCouponRelevanceLocationAddressSix($task99->getCouponRelevanceLocationAddressSix());
        $task9->setCouponRelevanceLocationTextSix($task99->getCouponRelevanceLocationTextSix());
        $task9->setCouponRelevanceLocationTextDynamicStatusSix($task99->getCouponRelevanceLocationTextDynamicStatusSix());
        $task9->setCouponRelevanceLocationAddressSeven($task99->getCouponRelevanceLocationAddressSeven());
        $task9->setCouponRelevanceLocationTextSeven($task99->getCouponRelevanceLocationTextSeven());
        $task9->setCouponRelevanceLocationTextDynamicStatusSeven($task99->getCouponRelevanceLocationTextDynamicStatusSeven());
        $task9->setCouponRelevanceLocationAddressEight($task99->getCouponRelevanceLocationAddressEight());
        $task9->setCouponRelevanceLocationTextEight($task99->getCouponRelevanceLocationTextEight());
        $task9->setCouponRelevanceLocationTextDynamicStatusEight($task99->getCouponRelevanceLocationTextDynamicStatusEight());
        $task9->setCouponRelevanceLocationAddressNine($task99->getCouponRelevanceLocationAddressNine());
        $task9->setCouponRelevanceLocationTextNine($task99->getCouponRelevanceLocationTextNine());
        $task9->setCouponRelevanceLocationTextDynamicStatusNine($task99->getCouponRelevanceLocationTextDynamicStatusNine());
        $task9->setCouponRelevanceLocationAddressTen($task99->getCouponRelevanceLocationAddressTen());
        $task9->setCouponRelevanceLocationTextTen($task99->getCouponRelevanceLocationTextTen());
        $task9->setCouponRelevanceLocationTextDynamicStatusTen($task99->getCouponRelevanceLocationTextDynamicStatusTen());
        $task9->setCouponRelevanceLocationDate($task99->getCouponRelevanceLocationDate());
        $task9->setCouponRelevanceLocationTime($task99->getCouponRelevanceLocationTime());
        $task9->setCouponRelevanceLocationTimezone($task99->getCouponRelevanceLocationTimezone());
        $task9->setCouponRelevanceLocationAddressOneLatitude($task99->getCouponRelevanceLocationAddressOneLatitude());
        $task9->setCouponRelevanceLocationAddressOneLongitude($task99->getCouponRelevanceLocationAddressOneLongitude());
        $task9->setCouponRelevanceLocationAddressTwoLatitude($task99->getCouponRelevanceLocationAddressTwoLatitude());
        $task9->setCouponRelevanceLocationAddressTwoLongitude($task99->getCouponRelevanceLocationAddressTwoLongitude());
        $task9->setCouponRelevanceLocationAddressThreeLatitude($task99->getCouponRelevanceLocationAddressThreeLatitude());
        $task9->setCouponRelevanceLocationAddressThreeLongitude($task99->getCouponRelevanceLocationAddressThreeLongitude());
        $task9->setCouponRelevanceLocationAddressFourLatitude($task99->getCouponRelevanceLocationAddressFourLatitude());
        $task9->setCouponRelevanceLocationAddressFourLongitude($task99->getCouponRelevanceLocationAddressFourLongitude());
        $task9->setCouponRelevanceLocationAddressFiveLatitude($task99->getCouponRelevanceLocationAddressFiveLatitude());
        $task9->setCouponRelevanceLocationAddressFiveLongitude($task99->getCouponRelevanceLocationAddressFiveLongitude());
        $task9->setCouponRelevanceLocationAddressSixLatitude($task99->getCouponRelevanceLocationAddressSixLatitude());
        $task9->setCouponRelevanceLocationAddressSixLongitude($task99->getCouponRelevanceLocationAddressSixLongitude());
        $task9->setCouponRelevanceLocationAddressSevenLatitude($task99->getCouponRelevanceLocationAddressSevenLatitude());
        $task9->setCouponRelevanceLocationAddressSevenLongitude($task99->getCouponRelevanceLocationAddressSevenLongitude());
        $task9->setCouponRelevanceLocationAddressEightLatitude($task99->getCouponRelevanceLocationAddressEightLatitude());
        $task9->setCouponRelevanceLocationAddressEightLongitude($task99->getCouponRelevanceLocationAddressEightLongitude());
        $task9->setCouponRelevanceLocationAddressNineLatitude($task99->getCouponRelevanceLocationAddressNineLatitude());
        $task9->setCouponRelevanceLocationAddressNineLongitude($task99->getCouponRelevanceLocationAddressNineLongitude());
        $task9->setCouponRelevanceLocationAddressTenLatitude($task99->getCouponRelevanceLocationAddressTenLatitude());
        $task9->setCouponRelevanceLocationAddressTenLongitude($task99->getCouponRelevanceLocationAddressTenLongitude());

        $em->persist($task9);

        $task10->setCouponId($generalid);
       // $task10->setDistributionStatus($task110->getDistributionStatus());
        $task10->setPassLinkType($task110->getPassLinkType());
        $task10->setRestrictMultiple($task110->getRestrictMultiple());
        $task10->setVoidPasses($task110->getVoidPasses());
        $task10->setPassExpirationDate($task110->getPassExpirationDate());
        $task10->setQuantityRestriction($task110->getQuantityRestriction());
        $task10->setLimitValue($task110->getLimitValue());
        $task10->setDateRestriction($task110->getDateRestriction());
        $task10->setRestrictedDate($task110->getRestrictedDate());
        $task10->setPasswordIssueStatus($task110->getPasswordIssueStatus());
        $task10->setFixedIssuePassword($task110->getFixedIssuePassword());
        $task10->setSingleUsePasswords($task110->getSingleUsePasswords());
        $task10->setPasswordUpdateStatus($task110->getPasswordUpdateStatus());
        $task10->setFixedUpdatePassword($task110->getFixedUpdatePassword());
        $task10->setSocialSharing($task110->getSocialSharing());
        $em->persist($task10);

        $em->flush();

        $newIconDir = $task2->getId();
        $src    = __DIR__ . "/../../../../web/upload/".$iconid."/";
        $dst    = __DIR__ . "/../../../../web/upload/".$newIconDir."/";
        if(@mkdir($dst, 0777, true)){
            $this->rcopy($src,$dst);
        }

        $createpass = self::generatePassAction($generalid);
        return $this->redirect($this->generateUrl('apb_appass_manage'));
    }
    public function rcopy($src, $dest){

        if(!is_dir($src)) return false;
        if(!is_dir($dest)) {
            if(!mkdir($dest)) {
                return false;
            }
        }
        $i = new \DirectoryIterator($src);
        foreach($i as $f) {
            if($f->isFile()) {
                copy($f->getRealPath(), "$dest/" . $f->getFilename());
            } else if(!$f->isDot() && $f->isDir()) {
                rcopy($f->getRealPath(), "$dest/$f");
            }
        }
    }
    public function manageUpdateAction(Request $request,$id)
    {
        $dynamicupdate = new mdynamic();
        $form = $this->createForm(new mdynamicType(), $dynamicupdate);
        if ($request->isMethod('POST')) {

            $em = $this->getDoctrine()->getManager();
            $form->bind($request);
            return $this->redirect($this->generateUrl('apb_appass_dynamicmanage'));
        }
        return $this->render('apbappassBundle:Default:dynamicupdate.html.twig',array(
            'form' => $form->createView(),
        ));

    }
    public function dataManagementAction(Request $request)
    {
        $root = $this->get('kernel')->getRootDir();
        $query = $this->getDoctrine()->getManager()
            ->createQuery(
                'SELECT h.id as Id ,f.categoryName as Category,
                  f.landingPage as landing,
                 f.templateName as Template ,f.couponId as couponId
                 FROM apbappassBundle:mgeneral f
                 JOIN apbappassBundle:mappearance h where f.couponId = h.couponId
                 ORDER BY f.passGenerationDate DESC'
            )->getResult(); // add this later g.manageStatus as manage
        //JOIN apbappassBundle:mdynamic g where h.couponId = g.couponId
        foreach($query as $key => $value)
        {
            if($query[$key]['landing']=="")
            {
                unset($query[$key]);
            }
        }
        //paginator
        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $this->get('request')->query->get('page', 1),
            10

        );
        return $this->render('apbappassBundle:Default:datamanagement.html.twig',array(
            'pagination' => $pagination
        ));
    }
    public function dataStatisticsAction()
    {
        return $this->redirect($this->generateUrl('apb_appass_datamanage'));
    }
    public function dynamicManagementAction()
    {

        $root = $this->get('kernel')->getRootDir();
        $query = $this->getDoctrine()->getManager()
            ->createQuery(
                'SELECT f.couponId as couponId , h.generationDate as generated,
                 f.templateName as Template
                 FROM apbappassBundle:mgeneral f
                 JOIN apbappassBundle:mdynamic h where f.couponId = h.couponId
                 ORDER BY h.generationDate DESC'
            )->getResult();
        //paginator
        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $this->get('request')->query->get('page', 1),
            10

        );
        return $this->render('apbappassBundle:Default:generatedpass.html.twig',array(
            'pagination' => $pagination
        ));
    }
    public function manageAction(Request $request)
    {


        $root = $this->get('kernel')->getRootDir();
        $src    = $root.'/logs/pkpass';

        $query = $this->getDoctrine()->getManager()
            ->createQuery(
                'SELECT e.couponBarcodeValueOption as Barcode, e.couponId as passSize,h.id as Id ,f.categoryName as Category,
                 f.passGenerationDate as Created ,f.templateName as Template ,f.couponId as couponId
                 ,g.distributionStatus as Distribution
                 FROM apbappassBundle:mdatasetting e
                 JOIN apbappassBundle:mgeneral f where e.couponId = f.couponId
                 JOIN apbappassBundle:mdistribution g where f.couponId = g.couponId
                 JOIN apbappassBundle:mappearance h where g.couponId = h.couponId
                 ORDER BY f.passGenerationDate DESC'
            )->getResult();

        foreach($query as $key => $value)
        {
            if($query[$key]['passSize']!="")
            {
                $filename = $src."/".$query[$key]['passSize'].".pkpass";
                $handle = fopen($filename, "r");
                $size = filesize($filename);
                fclose($handle);
                if($size<1024)
                {
                    $size = $size." bytes";
                }
                else if($size<(1024*1024))
                {
                    $size=round($size/1024,0);
                    $size = $size." KB";
                }
                else if($size<(1024*1024*1024))
                {
                    $size=round($size/(1024*1024),0);
                    $size = $size." MB";
                }
                else
                {
                    $size=round($size/(1024*1024*1024),0);
                    $size = $size." GB";
                }
                $query[$key]['passSize'] = $size;
            }
        }
        //paginator
        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
           $query,
            $this->get('request')->query->get('page', 1)/*page number*/,
            10/*limit per page*/
        );

        if ($request->isMethod('POST')) {

            $root = $this->get('kernel')->getRootDir();
            $form_data =  $request->request->get('del');
            if($form_data != ""){
                foreach ($form_data as $item) {

                    echo $item;
                    $em = $this->getDoctrine()->getEntityManager();
                    $query = $em->createQuery('DELETE from apbappassBundle:mgeneral at where at.couponId Like :title');
                    $query->setParameter('title', $item);
                   $query->execute();
                    $query1 = $em->createQuery('DELETE from apbappassBundle:mappearance bt where bt.couponId Like :title');
                    $query1->setParameter('title', $item);
                    $query1->execute();
                    $query2 = $em->createQuery('DELETE from apbappassBundle:mdatasetting ct where ct.couponId Like :title');
                    $query2->setParameter('title', $item);
                    $query2->execute();
                    $query3 = $em->createQuery('DELETE from apbappassBundle:mheader dt where dt.couponId Like :title');
                    $query3->setParameter('title', $item);
                    $query3->execute();
                    $query4 = $em->createQuery('DELETE from apbappassBundle:mprimary et where et.couponId Like :title');
                    $query4->setParameter('title', $item);
                    $query4->execute();
                    $query5 = $em->createQuery('DELETE from apbappassBundle:msecondary ft where ft.couponId Like :title');
                    $query5->setParameter('title', $item);
                    $query5->execute();
                    $query6 = $em->createQuery('DELETE from apbappassBundle:mauxiliary gt where gt.couponId Like :title');
                    $query6->setParameter('title', $item);
                    $query6->execute();
                    $query7 = $em->createQuery('DELETE from apbappassBundle:mbackfields ht where ht.couponId Like :title');
                    $query7->setParameter('title', $item);
                    $query7->execute();
                    $query8 = $em->createQuery('DELETE from apbappassBundle:mrelevance iit where iit.couponId Like :title');
                    $query8->setParameter('title', $item);
                    $query8->execute();
                    $query9 = $em->createQuery('DELETE from apbappassBundle:mdistribution jt where jt.couponId Like :title');
                    $query9->setParameter('title', $item);
                    $query9->execute();
                    $fs = new Filesystem();
                    $fs->remove($root.'/logs/pkpass/'.$item.'.pkpass');
                }
            }
            else{

            }

            return $this->redirect($this->generateUrl('apb_appass_manage'));
        }
        return $this->render('apbappassBundle:Default:management.html.twig',array(
            'pagination' => $pagination
        ));
    }
    public function profileAction()
    {
        return $this->render('apbappassBundle:Default:index.html.twig');
    }

}