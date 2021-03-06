<?php

namespace BS\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Upload
 *
 * @ORM\Table(name="upload")
 * @ORM\Entity(repositoryClass="BS\UserBundle\Entity\UploadRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Upload
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;

    /**
     * @Assert\File(maxSize="6000000", mimeTypes={"application/zip"})
     *
     */
    public $file;

    /**
     * @var integer
     *
     * @ORM\Column(name="ref_company", type="integer")
     */
    public $refCompany;

    /**
     * @var string
     *
     * @ORM\Column(name="name_company", type="string", length=255)
     *
     * @Assert\NotBlank()
     */
    public $nameCompagny;



    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     *
     * @Assert\NotBlank()
     */
    public $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="path", type="text")
     */
    public $path;


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
     * Set refCompany
     *
     * @param integer $refCompany
     * @return Upload
     */
    public function setRefCompany($refCompany)
    {
        $this->refCompany = $refCompany;

        return $this;
    }

    /**
     * Get refCompany
     *
     * @return integer 
     */
    public function getRefCompany()
    {
        return $this->refCompany;
    }

    /**
     * Set titre
     *
     * @param string $titre
     * @return Upload
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set path
     *
     * @param string $path
     * @return Upload
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
    }


    /**
     * Set file
     *
     * @param string $file
     */
    public function setFile($file)
    {
        $this->file = $file;
    }

    /**
     * Get file
     *
     * @return string
     */
    public function getFile()
    {
        return $this->file;
    }



    public function getAbsolutePath()
    {
        return null === $this->path ? null : $this->getUploadRootDir().'/'.$this->path;
    }

    public function getWebPath()
    {
        return null === $this->path ? null : $this->getUploadDir().'/'.$this->path;
    }

    protected function getUploadRootDir()
    {
        // le chemin absolu du répertoire où les documents uploadés doivent être sauvegardés
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // on se débarrasse de « __DIR__ » afin de ne pas avoir de problème lorsqu'on affiche
        // le document/image dans la vue.
        return 'uploads/'.$this->nameCompagny.'/'.$this->titre.'/';
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {
        $this->path = $this->file->getClientOriginalName();
    }

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {
        if (null === $this->file) {
            return;
        }

        // s'il y a une erreur lors du déplacement du fichier, une exception
        // va automatiquement être lancée par la méthode move(). Cela va empêcher
        // proprement l'entité d'être persistée dans la base de données si
        // erreur il y a
        $this->file->move($this->getUploadRootDir(), $this->path);

        unset($this->file);
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUpload()
    {
        if ($file = $this->getAbsolutePath()) {
            unlink($file);
        }
    }

    /**
     * Set nameCompagny
     *
     * @param string $nameCompagny
     * @return Upload
     */
    public function setNameCompagny($nameCompagny)
    {
        $this->nameCompagny = $nameCompagny;

        return $this;
    }

    /**
     * Get nameCompagny
     *
     * @return string 
     */
    public function getNameCompagny()
    {
        return $this->nameCompagny;
    }
}
