<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TipoTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * A função index deve retornar 5 cadastros
     *
     * @return void
     */
    public function test_example()
    {
        //Criar parametros
        $tipos = Tipo::factory()->count(5)->create();
        dd($tipo);
        //Processar

        //Verificar resposta
    }
}
