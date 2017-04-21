<?php

namespace apb\appassBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\VirtualProperty;
/**
 * @ORM\Entity
 * @UniqueEntity(fields="email", message="Email already taken")
 * @ExclusionPolicy("all")
 */
class User
{
    /**
     * @var integer
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Expose
     */
    protected $id;

    /**
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     * @Assert\NotBlank()
     * @Assert\Email()
     * @Expose
     */
    protected $email;

    /**
     * @ORM\Column(name="plain_password", type="string", length=255, nullable=true)
     * @Assert\NotBlank()
     * @Assert\Length(max = 4096)
     * @Expose
     */
    protected $plainPassword;
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
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }
    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }
    /**
     * Get plainPassword
     *
     * @return string
     */
    public function getPlainPassword()
    {
        return $this->plainPassword;
    }
    /**
     * Set plainPassword
     *
     * @param string $plainPassword
     *
     * @return User
     */
    public function setPlainPassword($password)
    {
        $this->plainPassword = $password;
    }
    /**
     * Get the user email and password
     *
     * @param $separator: the separator between email and password (default: ' ')
     * @return String
     * @VirtualProperty
     */
    public function getUser($separator = ' '){
        if($this->getEmail()!=null && $this->getPlainPassword()!=null){
            return ucfirst(strtolower($this->getPlainPassword())).$separator.strtoupper($this->getEmail());
        }
        else{
            return $this->getUser();
        }
    }
}

