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
        //$tipo = Tipo::factory()->create();


        //Criar parametros
        Tipo::factory()->count(5)->create();
        //Processar
        //Fazer uma chamada para a rota index no api
        //Usar verbo GET
        $response = $this->getJson('/api/tipos/');
        // dd($response['data']);
        //Verificar resposta
        $response
            ->assertStatus(200)
            ->assertJsonCount(5, 'data')
            ->assertJsonStructure(
                [
                    'data' => [
                        '*' => ['id', 'descricao', 'created_at', 'updated_at']
                    ]
                ]
            );
    }

    /**
     * Deve cadastrar um novo registro com sucesso
     * @return void
     */
    public function test_criar_um_novo_tipo_com_sucesso(){
        //Criar dados
        $data =[
            'descricao' => "Cancelado"
        ];
        //Processar
        $response = $this->postJson('/api/tipos/',$data);
        //Avaliar a saida
        $response->assertStatus(201)
        ->assertJsonStructure(['id', 'descricao', 'created_at', 
        'updated_at']);
    }
}
