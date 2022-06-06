<?php

namespace Arquitetura\Dominio\Aluno;

class Telefone implements \Stringable
{
    private string $ddd;
    private string $numero;

    /**
     * @param string $ddd
     * @param string $numero
     */
    public function __construct(string $ddd, string $numero)
    {
        $this->setDdd($ddd);
        $this->setNumero($numero);
    }

    private function setDdd(string $ddd): void
    {
        if (preg_match('/\d{2}/', $ddd) !== 1) {
            throw new \InvalidArgumentException('DDD inválido');
        }

        $this->ddd = $ddd;
    }

    private function setNumero(string $numero): void
    {
        if (preg_match('/\d{8,9}/', $numero) !== 1) {
            throw new \InvalidArgumentException('Número de telefone inválido');
        }

        $this->numero = $numero;
    }

    public function __toString(): string
    {
       return "($this->ddd) {$this->numero}";
    }
}