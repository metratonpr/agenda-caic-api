<?php

namespace Tests\Feature;

use App\Models\Tipo;
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
    public function test_funcao_index_retornar_array_com_sucesso()
    {
        //Criar parametros
        Tipo::factory()->count(5)->create();
        //Processar
        //Fazer uma chamada para a rota index no api
        //Usar verbo GET
        $response = $this->getJson('/api/tipos/');
        
        dd($response);
        //Verificar resposta
    }
}
