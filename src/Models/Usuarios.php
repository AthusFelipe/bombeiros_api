<?php

namespace App\Models;

use App\DAO\UsuariosDAO;

class Usuarios
{

    private int $codfunc;
    private int $nivelacesso;
    private string $nomeguerra;
    private string $cargo;
    private string $nomeusuario;
    private string $senhausuario;


    public function novoUsuario($nomeguerra, $cargo, $nomeusuario, $senhausuario)
    {
        $this->nomeguerra = $nomeguerra;
        $this->cargo = $cargo;
        $this->nomeusuario = $nomeusuario;
        $this->senhausuario = $senhausuario;
        $this->nivelacesso = 1;


        $cadastro = new UsuariosDAO;
        $cadastro->cadastrarNovo_Usuario($this->nomeusuario, $this->senhausuario, $this->cargo, $this->nomeguerra);
    }



    /**
     * Get the value of codfunc
     */
    public function getCodfunc()
    {
        return $this->codfunc;
    }

    /**
     * Set the value of codfunc
     *
     * @return  self
     */
    public function setCodfunc($codfunc)
    {
        $this->codfunc = $codfunc;

        return $this;
    }

    /**
     * Get the value of nivelacesso
     */
    public function getNivelacesso()
    {
        return $this->nivelacesso;
    }

    /**
     * Set the value of nivelacesso
     *
     * @return  self
     */
    public function setNivelacesso($nivelacesso)
    {
        $this->nivelacesso = $nivelacesso;

        return $this;
    }

    /**
     * Get the value of nomeguerra
     */
    public function getNomeguerra()
    {
        return $this->nomeguerra;
    }

    /**
     * Set the value of nomeguerra
     *
     * @return  self
     */
    public function setNomeguerra($nomeguerra)
    {
        $this->nomeguerra = $nomeguerra;

        return $this;
    }

    /**
     * Get the value of cargo
     */
    public function getCargo()
    {
        return $this->cargo;
    }

    /**
     * Set the value of cargo
     *
     * @return  self
     */
    public function setCargo($cargo)
    {
        $this->cargo = $cargo;

        return $this;
    }

    /**
     * Get the value of nomeusuario
     */
    public function getNomeusuario()
    {
        return $this->nomeusuario;
    }

    /**
     * Set the value of nomeusuario
     *
     * @return  self
     */
    public function setNomeusuario($nomeusuario)
    {
        $this->nomeusuario = $nomeusuario;

        return $this;
    }

    /**
     * Get the value of senhausuario
     */
    public function getSenhausuario()
    {
        return $this->senhausuario;
    }

    /**
     * Set the value of senhausuario
     *
     * @return  self
     */
    public function setSenhausuario($senhausuario)
    {
        $this->senhausuario = $senhausuario;

        return $this;
    }
}
