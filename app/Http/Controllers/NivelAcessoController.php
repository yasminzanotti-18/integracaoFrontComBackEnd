<?php
// estou no NivelAcessoController.php
namespace App\Http\Controllers;
use App\Models\NivelAcesso;
use Illuminate\Http\Request;
use exception;

class NivelAcessoController extends Controller
 {
  public function listar(){
        $nivelAcesso = NivelAcesso::all();
        return view('nivel-acesso.listar', compact('nivelAcesso'));
    }

    public function cadastro(){
        return view('nivel-acesso.cadastro');
    }

     public function add(Request $request){
        $request->validate([
            "nivelAcesso" => 'required|string|max:255',
        ]);

        try{
        $nivelAcesso = NivelAcesso::create([
            'nivel_acesso' => $request->nivelAcesso,
        ]);
        return redirect()->back()->with('success','Nivel de Acesso Cadastrado com Sucesso!');
    }catch(\Exception $e){
        return redirect()->back()->with('error','Erro ao cadastrar o Nivel de Acesso: ');
    }

   }

//     public function atualizar($id){
//         $produto = Produto::findOrFail($id); // Busca o produto pelo ID
//         $setores = Setores::get();
//         // select * from produtos where id = $id
//         return view('atualizarProduto', compact('produto','setores'));
//     }

//     public function update(Request $request, $id){
//         $request->validate([
//             'nome' => 'required|string|max:255',
//             'quantidade' => 'required|numeric|max:255',
//             'valor' => 'required|numeric',
//             'setor_id' => 'nullable|exists:setores,id'
//             // para poder ser nulo ou existir na tabela setores
//         ]);

//         $produto = Produto::findOrFail($id); // buscar aluno para ser atualizado
//         $detalhe = DetalheProdutos::where('produto_id', $produto->id)->first();

//         $produto->nome = $request->nome; // atualizando o campo nome
//         $produto->quantidade = $request->quantidade; // atualizando o campo quantidade
//         $produto->valor = $request->valor; // atualizando o campo valor
//         $produto->setor_id = $request->setor_id; // atualizando o campo setor_id

//         $produto->save(); // salvando no banco de dados(fazendo update)

//         $detalhe->descricao = $request->descricao;
//         $detalhe->tamanho = $request->tamanho;
//         $detalhe->peso = $request->peso;

//         $detalhe->save();

//         return redirect()->back()->with('success','Produto atualizado com suceso');
//     }

    public function deletar($id){
        $nivelAcesso = NivelAcesso::findOrFail($id); // buscar o produto para depois deletar
        $nivelAcesso->delete(); // faz o delete no banco de dados

        return redirect()->route('nivel-acesso.listar')
            ->with('success','Nivel de Acesso excluído com sucesso!');
    }

}