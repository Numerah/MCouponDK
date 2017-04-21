<?php

namespace apb\appassBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints AS Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * mappearance
 *
 * @ORM\Table()
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity
 */
class mappearance
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=true)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @Assert\NotBlank
     * @ORM\Column(name="coupon_id", type="string",length=255, nullable=true)
     */
    private $couponId;

    /**
     * @var string $icon_name
     * @Assert\File( maxSize = "1024k", mimeTypesMessage = "Please upload a valid Image")
     * @ORM\Column(name="icon_name", type="string", length=255, nullable=true)
     */
    private $iconName;

    /**
     * @Assert\File(maxSize="6000000")
    */
    private $iconNameFile;


    /**
     * @var string $logo_name
     * @Assert\File( maxSize = "1024k", mimeTypesMessage = "Please upload a valid Image")
     * @ORM\Column(name="logo_name", type="string", length=255, nullable=true)
     */
    private $logoName;

    /**
     * @Assert\File(maxSize="6000000")
     */
    private $logoNameFile;

    /**
     * @var string
     *
     * @ORM\Column(name="logo_text", type="string", length=255, nullable=true)
     */
    private $logoText;

    /**
     *
     * @var string $generic_thumbnail
     * @Assert\File( maxSize = "1024k", mimeTypesMessage = "Please upload a valid Image")
     * @ORM\Column(name="generic_thumbnail", type="string", length=255, nullable=true)
     */
    private $genericThumbnail;

    /**
     * @Assert\File(maxSize="6000000")
     */
    private $genericThumbnailFile;

    /**
     *
     * @var string $boarding_pass_footer
     * @Assert\File( maxSize = "1024k", mimeTypesMessage = "Please upload a valid Image")
     * @ORM\Column(name="boarding_pass_footer", type="string", length=255, nullable=true)
     */
    private $boardingPassFooter;

    /**
     * @Assert\File(maxSize="6000000")
     */
    private $boardingPassFooterFile;


    /**
     *
     * @var string $coupon_strip
     * @Assert\File( maxSize = "1024k", mimeTypesMessage = "Please upload a valid Image")
     * @ORM\Column(name="coupon_strip", type="string", length=255, nullable=true)
     */
    private $couponStrip;

    /**
     * @Assert\File(maxSize="6000000")
     */
    private $couponStripFile;


    /**
     * @var string $store_card_strip
     * @Assert\File( maxSize = "1024k", mimeTypesMessage = "Please upload a valid Image")
     * @ORM\Column(name="store_card_strip", type="string", length=255, nullable=true)
     */
    private $storeCardStrip;

    /**
     * @Assert\File(maxSize="6000000")
     */
    private $storeCardStripFile;

    /**
     * @var string $event_ticket_status
     * @Assert\File( maxSize = "1024k", mimeTypesMessage = "Please upload a valid Image")
     * @ORM\Column(name="event_ticket_status", type="string", length=255, nullable=true)
     */
    private $eventTicketStatus;

    /**
     * @var string $event_ticket_strip
     * @Assert\File( maxSize = "1024k", mimeTypesMessage = "Please upload a valid Image")
     * @ORM\Column(name="event_ticket_strip", type="string", length=255, nullable=true)
     */
    private $eventTicketStrip;

    /**
     * @Assert\File(maxSize="6000000")
     */
    private $eventTicketStripFile;

    /**
     * @var string $event_ticket_thumbnail
     * @Assert\File( maxSize = "1024k", mimeTypesMessage = "Please upload a valid Image")
     * @ORM\Column(name="event_ticket_thumbnail", type="string", length=255, nullable=true)
     */
    private $eventTicketThumbnail;

    /**
     * @Assert\File(maxSize="6000000")
     */
    private $eventTicketThumbnailFile;

    /**
     * @var string $event_ticket_background
     * @Assert\File( maxSize = "1024k", mimeTypesMessage = "Please upload a valid Image")
     * @ORM\Column(name="event_ticket_background", type="string", length=255, nullable=true)
     */
    private $eventTicketBackground;

    /**
     * @Assert\File(maxSize="6000000")
     */
    private $eventTicketBackgroundFile;

    /**
     * @var string
     *
     * @ORM\Column(name="background_color_code", type="string", length=255, nullable=true)
     */
    private $backgroundColorCode;

    /**
     * @var string
     *
     * @ORM\Column(name="field_label_color_code", type="string", length=255, nullable=true)
     */
    private $fieldLabelColorCode;

    /**
     * @var string
     *
     * @ORM\Column(name="field_value_color_code", type="string", length=255, nullable=true)
     */
    private $fieldValueColorCode;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set couponId
     *
     * @param string $couponId
     *
     * @return mappearance
     */
    public function setCouponId($couponId)
    {
        $this->couponId = $couponId;
    
        return $this;
    }
    /**
     * Get couponId
     *
     * @return string
     */
    public function getCouponId()
    {
        return $this->couponId;
    }

    public function __toString()
    {
        return ''.$this->couponId;
    }


    /**
     * Set iconName
     *
     * @param string $iconName
     *
     * @return mappearance
     */
    public function setIconName($iconName)
    {
        $this->iconName = $iconName;
        return $this;
    }

    /**
     * Get iconName
     *
     * @return string 
     */
    public function getIconName()
    {
        return $this->iconName;
    }

    /**
     * Set logoName
     *
     * @param string $logoName
     *
     * @return mappearance
     */
    public function setLogoName($logoName)
    {
        $this->logoName = $logoName;
    
        return $this;
    }

    /**
     * Get logoName
     *
     * @return string 
     */
    public function getLogoName()
    {
        return $this->logoName;
    }

    /**
     * Set logoText
     *
     * @param string $logoText
     *
     * @return mappearance
     */
    public function setLogoText($logoText)
    {
        $this->logoText = $logoText;
    
        return $this;
    }

    /**
     * Get logoText
     *
     * @return string 
     */
    public function getLogoText()
    {
        return $this->logoText;
    }

    /**
     * Set genericThumbnail
     *
     * @param string $genericThumbnail
     *
     * @return mappearance
     */
    public function setGenericThumbnail($genericThumbnail)
    {
        $this->genericThumbnail = $genericThumbnail;
    
        return $this;
    }

    /**
     * Get genericThumbnail
     *
     * @return string 
     */
    public function getGenericThumbnail()
    {
        return $this->genericThumbnail;
    }


    /**
     * Set boardingPassFooter
     *
     * @param string $boardingPassFooter
     *
     * @return mappearance
     */
    public function setBoardingPassFooter($boardingPassFooter)
    {
        $this->boardingPassFooter = $boardingPassFooter;
    
        return $this;
    }

    /**
     * Get boardingPassFooter
     *
     * @return string 
     */
    public function getBoardingPassFooter()
    {
        return $this->boardingPassFooter;
    }


    /**
     * Set couponStrip
     *
     * @param string $couponStrip
     *
     * @return mappearance
     */
    public function setCouponStrip($couponStrip)
    {
        $this->couponStrip = $couponStrip;
    
        return $this;
    }

    /**
     * Get couponStrip
     *
     * @return string 
     */
    public function getCouponStrip()
    {
        return $this->couponStrip;
    }


    /**
     * Set storeCardStrip
     *
     * @param string $storeCardStrip
     *
     * @return mappearance
     */
    public function setStoreCardStrip($storeCardStrip)
    {
        $this->storeCardStrip = $storeCardStrip;
    
        return $this;
    }

    /**
     * Get storeCardStrip
     *
     * @return string 
     */
    public function getStoreCardStrip()
    {
        return $this->storeCardStrip;
    }

    /**
     * Set eventTicketStatus
     *
     * @param string $eventTicketStatus
     *
     * @return mappearance
     */
    public function setEventTicketStatus($eventTicketStatus)
    {
        $this->eventTicketStatus = $eventTicketStatus;
    
        return $this;
    }

    /**
     * Get eventTicketStatus
     *
     * @return string 
     */
    public function getEventTicketStatus()
    {
        return $this->eventTicketStatus;
    }


    /**
     * Set eventTicketStrip
     *
     * @param string $eventTicketStrip
     *
     * @return mappearance
     */
    public function setEventTicketStrip($eventTicketStrip)
    {
        $this->eventTicketStrip = $eventTicketStrip;
    
        return $this;
    }

    /**
     * Get eventTicketStrip
     *
     * @return string 
     */
    public function getEventTicketStrip()
    {
        return $this->eventTicketStrip;
    }


    /**
     * Set eventTicketThumbnail
     *
     * @param string $eventTicketThumbnail
     *
     * @return mappearance
     */
    public function setEventTicketThumbnail($eventTicketThumbnail)
    {
        $this->eventTicketThumbnail = $eventTicketThumbnail;
        return $this;
    }

    /**
     * Get eventTicketThumbnail
     *
     * @return string 
     */
    public function getEventTicketThumbnail()
    {
        return $this->eventTicketThumbnail;
    }




    /**
     * Set eventTicketBackground
     *
     * @param string $eventTicketBackground
     *
     * @return mappearance
     */
    public function setEventTicketBackground($eventTicketBackground)
    {
        $this->eventTicketBackground = $eventTicketBackground;
    
        return $this;
    }

    /**
     * Get eventTicketBackground
     *
     * @return string 
     */
    public function getEventTicketBackground()
    {
        return $this->eventTicketBackground;
    }

    /**
     * Set backgroundColorCode
     *
     * @param string $backgroundColorCode
     *
     * @return mappearance
     */
    public function setBackgroundColorCode($backgroundColorCode)
    {
        $this->backgroundColorCode = $backgroundColorCode;
    
        return $this;
    }

    /**
     * Get backgroundColorCode
     *
     * @return string 
     */
    public function getBackgroundColorCode()
    {
        return $this->backgroundColorCode;
    }

    /**
     * Set fieldLabelColorCode
     *
     * @param string $fieldLabelColorCode
     *
     * @return mappearance
     */
    public function setFieldLabelColorCode($fieldLabelColorCode)
    {
        $this->fieldLabelColorCode = $fieldLabelColorCode;
    
        return $this;
    }

    /**
     * Get fieldLabelColorCode
     *
     * @return string 
     */
    public function getFieldLabelColorCode()
    {
        return $this->fieldLabelColorCode;
    }

    /**
     * Set fieldValueColorCode
     *
     * @param string $fieldValueColorCode
     *
     * @return mappearance
     */
    public function setFieldValueColorCode($fieldValueColorCode)
    {
        $this->fieldValueColorCode = $fieldValueColorCode;
    
        return $this;
    }

    /**
     * Get fieldValueColorCode
     *
     * @return string 
     */
    public function getFieldValueColorCode()
    {
        return $this->fieldValueColorCode;
    }


    /*  _file paths */
    public function getImageDirById(){
        return $this->getId();
    }

    protected function getWebDir(){
        return __DIR__.'/../../../../web/';
    }


    protected function getUploadRootDir(){
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir(){
        return 'upload/'.$this->getImageDirById();
    }

    /*  _files getter/setter methods */
    public function setIconNameFile(UploadedFile $file = null){
        $this->iconNameFile = $file;
    }

    public function getIconNameFile(){
        return $this->iconNameFile;
    }

    //#2
    public function setLogoNameFile(UploadedFile $file = null){
        $this->logoNameFile = $file;
    }

    public function getLogoNameFile(){
        return $this->logoNameFile;
    }

    //#3
    public function setGenericThumbnailFile(UploadedFile $file = null){
        $this->genericThumbnailFile = $file;
    }

    public function getGenericThumbnailFile(){
        return $this->genericThumbnailFile;
    }

    //#4
    public function setBoardingPassFooterFile(UploadedFile $file = null){
        $this->boardingPassFooterFile = $file;
    }

    public function getBoardingPassFooterFile(){
        return $this->boardingPassFooterFile;
    }

    //#5
    public function setCouponStripFile(UploadedFile $file = null){
        $this->couponStripFile = $file;
    }

    public function getCouponStripFile(){
        return $this->couponStripFile;
    }

    //#6
    public function setStoreCardStripFile(UploadedFile $file = null){
        $this->storeCardStripFile = $file;
    }

    public function getStoreCardStripFile(){
        return $this->storeCardStripFile;
    }

    //#7
    public function setEventTicketStripFile(UploadedFile $file = null){
        $this->eventTicketStripFile = $file;
    }

    public function getEventTicketStripFile(){
        return $this->eventTicketStripFile;
    }

    //#8
    public function setEventTicketThumbnailFile(UploadedFile $file = null){
        $this->eventTicketThumbnailFile = $file;
    }

    public function getEventTicketThumbnailFile(){
        return $this->eventTicketThumbnailFile;
    }

    //#9
    public function setEventTicketBackgroundFile(UploadedFile $file = null){
        $this->eventTicketBackgroundFile = $file;
    }

    public function getEventTicketBackgroundFile(){
        return $this->eventTicketBackgroundFile;
    }



    /*  _files upload methdos        */
    public function uploads( $crudMode='add' ,$preIconName='' ,$preLogoName='' , $preGenericThumbnail='',
                             $preBoardingPassFooter='',$preCouponStrip='',$preStoreCardStrip='',
                             $preEventTicketStrip='', $preEventTicketThumbnail='', $preEventTicketBackground='')
    {
        $this->uploadIconNameFile($crudMode,$preIconName);
        $this->uploadLogoNameFile($crudMode,$preLogoName);
        $this->uploadGenericThumbnailFile($crudMode,$preGenericThumbnail);
        $this->uploadBoardingPassFooterFile($crudMode,$preBoardingPassFooter);
        $this->uploadCouponStripFile($crudMode,$preCouponStrip);
        $this->uploadStoreCardStripFile($crudMode,$preStoreCardStrip);
        $this->uploadEventTicketStripFile($crudMode,$preEventTicketStrip);
        $this->uploadEventTicketThumbnailFile($crudMode,$preEventTicketThumbnail);
        $this->uploadeventTicketBackgroundFile($crudMode,$preEventTicketBackground);
    }

    //#1
    private function uploadIconNameFile( $crudMode , $prevoiusImage ){
        if($this->getIconNameFile()){
            if ($this->getIconNameFile() instanceof UploadedFile) {
                $filename = sha1(uniqid(mt_rand(), true));
                $filenameext = $filename.'.'.pathinfo($this->getIconNameFile()->getClientOriginalName(), PATHINFO_EXTENSION);
                $this->getIconNameFile()->move( $this->getUploadRootDir(), $filenameext);
                if('' != $prevoiusImage){
                    $oldImgFile = $this->getUploadRootDir().'/'.$prevoiusImage;
                    if(file_exists($oldImgFile)) {unlink($oldImgFile);}
                }
                $this->setIconName($filenameext);
            }
        }
        // check old image exists , just remove icon
        if(empty($this->getIconName()) && $crudMode === 'edit'){
            if('' != $prevoiusImage){
                $oldImgFile = $this->getUploadRootDir().'/'.$prevoiusImage;
                if(file_exists($oldImgFile)) {unlink($oldImgFile);}
            }
        }
    }

    //#2
    private function uploadLogoNameFile($crudMode , $prevoiusImage){
        if($this->getLogoNameFile()){
            if ($this->getLogoNameFile() instanceof UploadedFile) {
                $filename = sha1(uniqid(mt_rand(), true));
                $filenameext = $filename.'.'.pathinfo($this->getLogoNameFile()->getClientOriginalName(), PATHINFO_EXTENSION);
                $this->getLogoNameFile()->move( $this->getUploadRootDir(), $filenameext);
                if('' != $prevoiusImage){
                    $oldImgFile = $this->getUploadRootDir().'/'.$prevoiusImage;
                    if(file_exists($oldImgFile)) {unlink($oldImgFile);}
                }
                $this->setLogoName($filenameext);
            }
        }
        // check old image exists
        if(empty($this->getLogoName()) && $crudMode === 'edit'){
            if('' != $prevoiusImage){
                $oldImgFile = $this->getUploadRootDir().'/'.$prevoiusImage;
                if(file_exists($oldImgFile)) {unlink($oldImgFile);}
            }
        }
    }

    //#3
    private function uploadGenericThumbnailFile($crudMode , $prevoiusImage){
        if($this->getGenericThumbnailFile()){
            if ($this->getGenericThumbnailFile() instanceof UploadedFile) {
                $filename = sha1(uniqid(mt_rand(), true));
                $filenameext = $filename.'.'.pathinfo($this->getGenericThumbnailFile()->getClientOriginalName(), PATHINFO_EXTENSION);
                $this->getGenericThumbnailFile()->move( $this->getUploadRootDir(), $filenameext);
                if('' != $prevoiusImage){
                    $oldImgFile = $this->getUploadRootDir().'/'.$prevoiusImage;
                    if(file_exists($oldImgFile)) {unlink($oldImgFile);}
                }
                $this->setGenericThumbnail($filenameext);
            }
        }
        // check old image exists
        if(empty($this->getGenericThumbnail()) && $crudMode === 'edit'){
            if('' != $prevoiusImage){
                $oldImgFile = $this->getUploadRootDir().'/'.$prevoiusImage;
                if(file_exists($oldImgFile)) {unlink($oldImgFile);}
            }
        }
    }

    //#4
    private function uploadBoardingPassFooterFile($crudMode , $prevoiusImage){
        if($this->getBoardingPassFooterFile()){
            if ($this->getBoardingPassFooterFile() instanceof UploadedFile) {
                $filename = sha1(uniqid(mt_rand(), true));
                $filenameext = $filename.'.'.pathinfo($this->getBoardingPassFooterFile()->getClientOriginalName(), PATHINFO_EXTENSION);
                $this->getBoardingPassFooterFile()->move( $this->getUploadRootDir(), $filenameext);
                if('' != $prevoiusImage){
                    $oldImgFile = $this->getUploadRootDir().'/'.$prevoiusImage;
                    if(file_exists($oldImgFile)) {unlink($oldImgFile);}
                }
                $this->setBoardingPassFooter($filenameext);
            }
        }
        // check old image exists
        if(empty($this->getBoardingPassFooter()) && $crudMode === 'edit'){
            if('' != $prevoiusImage){
                $oldImgFile = $this->getUploadRootDir().'/'.$prevoiusImage;
                if(file_exists($oldImgFile)) {unlink($oldImgFile);}
            }
        }
    }

    //#5
    private function uploadCouponStripFile($crudMode , $prevoiusImage){
        if($this->getCouponStripFile()){
            if ($this->getCouponStripFile() instanceof UploadedFile) {
                $filename = sha1(uniqid(mt_rand(), true));
                $filenameext = $filename.'.'.pathinfo($this->getCouponStripFile()->getClientOriginalName(), PATHINFO_EXTENSION);
                $this->getCouponStripFile()->move( $this->getUploadRootDir(), $filenameext);
                if('' != $prevoiusImage){
                    $oldImgFile = $this->getUploadRootDir().'/'.$prevoiusImage;
                    if(file_exists($oldImgFile)) {unlink($oldImgFile);}
                }
                $this->setCouponStrip($filenameext);
            }
        }
        // check old image exists
        if(empty($this->getCouponStrip()) && $crudMode === 'edit'){
            if('' != $prevoiusImage){
                $oldImgFile = $this->getUploadRootDir().'/'.$prevoiusImage;
                if(file_exists($oldImgFile)) {unlink($oldImgFile);}
            }
        }
    }

    //#6
    private function uploadStoreCardStripFile($crudMode , $prevoiusImage){
        if($this->getStoreCardStripFile()){
            if ($this->getStoreCardStripFile() instanceof UploadedFile) {
                $filename = sha1(uniqid(mt_rand(), true));
                $filenameext = $filename.'.'.pathinfo($this->getStoreCardStripFile()->getClientOriginalName(), PATHINFO_EXTENSION);
                $this->getStoreCardStripFile()->move( $this->getUploadRootDir(), $filenameext);
                if('' != $prevoiusImage){
                    $oldImgFile = $this->getUploadRootDir().'/'.$prevoiusImage;
                    if(file_exists($oldImgFile)) {unlink($oldImgFile);}
                }
                $this->setStoreCardStrip($filenameext);
            }
        }
        // check old image exists
        if(empty($this->getStoreCardStrip()) && $crudMode === 'edit'){
            if('' != $prevoiusImage){
                $oldImgFile = $this->getUploadRootDir().'/'.$prevoiusImage;
                if(file_exists($oldImgFile)) {unlink($oldImgFile);}
            }
        }
    }

    //#7
    private function uploadEventTicketStripFile( $crudMode , $prevoiusImage ){
        if($this->getEventTicketStripFile()){
            if ($this->getEventTicketStripFile() instanceof UploadedFile) {
                $filename = sha1(uniqid(mt_rand(), true));
                $filenameext = $filename.'.'.pathinfo($this->getEventTicketStripFile()->getClientOriginalName(), PATHINFO_EXTENSION);
                $this->getEventTicketStripFile()->move( $this->getUploadRootDir(), $filenameext);
                if('' != $prevoiusImage){
                    $oldImgFile = $this->getUploadRootDir().'/'.$prevoiusImage;
                    if(file_exists($oldImgFile)) {unlink($oldImgFile);}
                }
                $this->setEventTicketStrip($filenameext);
            }
        }
        // check old image exists
        if(empty($this->getEventTicketStrip()) && $crudMode === 'edit'){
            if('' != $prevoiusImage){
                $oldImgFile = $this->getUploadRootDir().'/'.$prevoiusImage;
                if(file_exists($oldImgFile)) {unlink($oldImgFile);}
            }
        }
    }

    //#8
    private function uploadEventTicketThumbnailFile( $crudMode , $prevoiusImage ){
        if($this->getEventTicketThumbnailFile()){
            if ($this->getEventTicketThumbnailFile() instanceof UploadedFile) {
                $filename = sha1(uniqid(mt_rand(), true));
                $filenameext = $filename.'.'.pathinfo($this->getEventTicketThumbnailFile()->getClientOriginalName(), PATHINFO_EXTENSION);
                $this->getEventTicketThumbnailFile()->move( $this->getUploadRootDir(), $filenameext);
                if('' != $prevoiusImage){
                    $oldImgFile = $this->getUploadRootDir().'/'.$prevoiusImage;
                    if(file_exists($oldImgFile)) {unlink($oldImgFile);}
                }
                $this->setEventTicketThumbnail($filenameext);
            }
        }
        // check old image exists
        if(empty($this->getEventTicketThumbnail()) && $crudMode === 'edit'){
            if('' != $prevoiusImage){
                $oldImgFile = $this->getUploadRootDir().'/'.$prevoiusImage;
                if(file_exists($oldImgFile)) {unlink($oldImgFile);}
            }
        }
    }

    //#9
    private function uploadEventTicketBackgroundFile( $crudMode , $prevoiusImage ){
        if($this->getEventTicketBackgroundFile()){
            if ($this->getEventTicketBackgroundFile() instanceof UploadedFile) {
                $filename = sha1(uniqid(mt_rand(), true));
                $filenameext = $filename.'.'.pathinfo($this->getEventTicketBackgroundFile()->getClientOriginalName(), PATHINFO_EXTENSION);
                $this->getEventTicketBackgroundFile()->move( $this->getUploadRootDir(), $filenameext);
                if('' != $prevoiusImage){
                    $oldImgFile = $this->getUploadRootDir().'/'.$prevoiusImage;
                    if(file_exists($oldImgFile)) {unlink($oldImgFile);}
                }
                $this->setEventTicketBackground($filenameext);
            }
        }
        // check old image exists
        if(empty($this->getEventTicketBackground()) && $crudMode === 'edit'){
            if('' != $prevoiusImage){
                $oldImgFile = $this->getUploadRootDir().'/'.$prevoiusImage;
                if(file_exists($oldImgFile)) {unlink($oldImgFile);}
            }
        }
    }

}

