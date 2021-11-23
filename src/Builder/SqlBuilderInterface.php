<?php
namespace Space\Builder;

interface SqlBuilderInterface extends BuilderInterface
{
    /**
     * @return string
     */
    public function build(): string;
}