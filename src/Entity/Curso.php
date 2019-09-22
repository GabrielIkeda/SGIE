<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\PersistentCollection;

/**
 * @ORM\Table(name="curso")
 * @ORM\Entity(repositoryClass="App\Repository\CursoRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Curso
{

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var Status
     * @ORM\ManyToOne(targetEntity="Status", inversedBy="curso")
     * @ORM\JoinColumn(name="status_id", referencedColumnName="id")
     */
    private $status;

    /**
     * @var Instituicao
     * @ORM\ManyToOne(targetEntity="Instituicao", inversedBy="curso")
     * @ORM\JoinColumn(name="instituicao_id", referencedColumnName="id")
     */
    private $instituicao;

    /**
     * @ORM\Column(type="float")
     */
    private $duracao;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getDuracao()
    {
        return $this->duracao;
    }

    /**
     * @param mixed $duracao
     */
    public function setDuracao($duracao): void
    {
        $this->duracao = $duracao;
    }

    /**
     * @return Status
     */
    public function getStatus(): Status
    {
        return $this->status;
    }

    /**
     * @param Status $status
     */
    public function setStatus(Status $status): void
    {
        $this->status = $status;
    }

    /**
     * @return Instituicao
     */
    public function getInstituicao(): Instituicao
    {
        return $this->instituicao;
    }

    /**
     * @param Instituicao $instituicao
     */
    public function setInstituicao(Instituicao $instituicao): void
    {
        $this->instituicao = $instituicao;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $createdAt
     */
    public function setCreatedAt($createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param mixed $updatedAt
     */
    public function setUpdatedAt($updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @ORM\PrePersist
     */
    public function prePersist()
    {
        $this->setCreatedAt(new \DateTime);
    }

    /**
     * @ORM\PrePersist
     */
    public function preUpdate()
    {
        if (!$this->getCreatedAt()) {
            $this->setCreatedAt(new \DateTime);
        }

        $this->setUpdatedAt(new \DateTime);
    }
}