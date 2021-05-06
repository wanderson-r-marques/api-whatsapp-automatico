<?php
class Message
{
    private $descricao;
    private $telefone;
    private $mensagem;
    private $enviado;
    private $dataHoraEnvio;
    private $retorno;
    private $link;
    private $status;
    

    /**
     * Get the value of link
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set the value of link
     */
    public function setLink($link): self
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get the value of retorno
     */
    public function getRetorno()
    {
        return $this->retorno;
    }

    /**
     * Set the value of retorno
     */
    public function setRetorno($retorno): self
    {
        $this->retorno = $retorno;

        return $this;
    }

    /**
     * Get the value of dataHoraEnvio
     */
    public function getDataHoraEnvio()
    {
        return $this->dataHoraEnvio;
    }

    /**
     * Set the value of dataHoraEnvio
     */
    public function setDataHoraEnvio($dataHoraEnvio): self
    {
        $this->dataHoraEnvio = $dataHoraEnvio;

        return $this;
    }

    /**
     * Get the value of enviado
     */
    public function getEnviado()
    {
        return $this->enviado;
    }

    /**
     * Set the value of enviado
     */
    public function setEnviado($enviado): self
    {
        $this->enviado = $enviado;

        return $this;
    }

    /**
     * Get the value of mensagem
     */
    public function getMensagem()
    {
        return $this->mensagem;
    }

    /**
     * Set the value of mensagem
     */
    public function setMensagem($mensagem): self
    {
        $this->mensagem = $mensagem;

        return $this;
    }

    /**
     * Get the value of telefone
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * Set the value of telefone
     */
    public function setTelefone($telefone): self
    {
        $this->telefone = $telefone;

        return $this;
    }

    /**
     * Get the value of descricao
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set the value of descricao
     */
    public function setDescricao($descricao): self
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * Get the value of status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     */
    public function setStatus($status) : self
    {
        $this->status = $status;

        return $this;
    }
}
