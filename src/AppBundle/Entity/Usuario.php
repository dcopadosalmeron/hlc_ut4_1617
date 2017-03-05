<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Validation;

/**
 * @ORM\Entity
 */
class Usuario implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @var integer
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     * @Validation\Email()
     * @Validation\NotBlank()
     * @var string
     */
    private $correoElectronico;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $clave;

    /**
     * @ORM\Column(type="boolean")
     * @var bool
     */
    private $administrador;

    /**
     * @ORM\Column(type="boolean")
     * @var bool
     */
    private $arbitro;

    /**
     * @ORM\Column(type="boolean")
     * @var bool
     */
    private $comentarista;


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
     * Set correoElectronico
     *
     * @param string $correoElectronico
     * @return Usuario
     */
    public function setCorreoElectronico($correoElectronico)
    {
        $this->correoElectronico = $correoElectronico;

        return $this;
    }

    /**
     * Get correoElectronico
     *
     * @return string 
     */
    public function getCorreoElectronico()
    {
        return $this->correoElectronico;
    }

    /**
     * Set clave
     *
     * @param string $clave
     * @return Usuario
     */
    public function setClave($clave)
    {
        $this->clave = $clave;

        return $this;
    }

    /**
     * Get clave
     *
     * @return string 
     */
    public function getClave()
    {
        return $this->clave;
    }

    /**
     * Set administrador
     *
     * @param boolean $administrador
     * @return Usuario
     */
    public function setAdministrador($administrador)
    {
        $this->administrador = $administrador;

        return $this;
    }

    /**
     * Get administrador
     *
     * @return boolean 
     */
    public function isAdministrador()
    {
        return $this->administrador;
    }

    /**
     * Set arbitro
     *
     * @param boolean $arbitro
     * @return Usuario
     */
    public function setArbitro($arbitro)
    {
        $this->arbitro = $arbitro;

        return $this;
    }

    /**
     * Get arbitro
     *
     * @return boolean 
     */
    public function isArbitro()
    {
        return $this->arbitro;
    }

    /**
     * Set comentarista
     *
     * @param boolean $comentarista
     * @return Usuario
     */
    public function setComentarista($comentarista)
    {
        $this->comentarista = $comentarista;

        return $this;
    }

    /**
     * Get comentarista
     *
     * @return boolean 
     */
    public function isComentarista()
    {
        return $this->comentarista;
    }

    /**
     * Returns the roles granted to the user.
     *
     * <code>
     * public function getRoles()
     * {
     *     return array('ROLE_USER');
     * }
     * </code>
     *
     * Alternatively, the roles might be stored on a ``roles`` property,
     * and populated in any number of different ways when the user object
     * is created.
     *
     * @return (Role|string)[] The user roles
     */
    public function getRoles()
    {
        $roles = ['ROLE_USER'];

        if ($this->isAdministrador()) {
            $roles[] = 'ROLE_ADMIN';
        }

        if ($this->isArbitro()) {
            $roles[] = 'ROLE_ARBITRO';
        }

        if ($this->isComentarista()) {
            $roles[] = 'ROLE_COMENTARISTA';
        }

        return $roles;
    }

    /**
     * Returns the password used to authenticate the user.
     *
     * This should be the encoded password. On authentication, a plain-text
     * password will be salted, encoded, and then compared to this value.
     *
     * @return string The password
     */
    public function getPassword()
    {
        return $this->getClave();
    }

    /**
     * Returns the salt that was originally used to encode the password.
     *
     * This can return null if the password was not encoded using a salt.
     *
     * @return string|null The salt
     */
    public function getSalt()
    {
        return null;
    }

    /**
     * Returns the username used to authenticate the user.
     *
     * @return string The username
     */
    public function getUsername()
    {
        return $this->getCorreoElectronico();
    }

    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials()
    {
    }
}
