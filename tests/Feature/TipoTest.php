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

    /**
     * Deve cadastrar um novo registro com falha
     * @return void
     */
    public function test_criar_um_novo_tipo_com_falha(){
        //Criar dados
        $data =[
            'descricao' => ""
        ];
        //Processar
        $response = $this->postJson('/api/tipos/',$data);
        //Avaliar a saida
        $response->assertStatus(422)
        ->assertJsonValidationErrors(['descricao']);
    }
    /**
     * Buscar um id no servidor com sucesso!
     * @return void
     */
    public function test_buscar_id_no_banco_com_sucesso(){
        //Criar dados
        $tipo = Tipo::factory()->create();
        //processar
        $response = $this->getJson('/api/tipos/'.$tipo->id);
        //verificar saida
        $response->assertStatus(200)
        ->assertJson([
            'id' => $tipo->id,
            'descricao' => $tipo->descricao,
        ]);
    }
    /**
     * Deve dar erro ao tentar pesquisar um cadastro inexistente
     * @return void
     */
    public function test_buscar_id_no_banco_com_falha(){

        //processar
        $response = $this->getJson('/api/tipos/99999999');
        //verificar saida
        $response->assertStatus(404)
        ->assertJson([
            'message' => "Tipo não encontrado!"
        ]);
    }
}
