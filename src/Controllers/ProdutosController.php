<?php
    namespace SplitPlay\Controllers\ProdutosController;

    use Psr\Http\Message\ResponseInterface as Response;
    use Psr\Http\Message\ServerRequestInterface as Request;
    
    class ProdutoController{
        
        public function getProduto(Request $request,  Response $response, array $args){
            $response->getBody()->write('{"name":"ela"}');    
            
            // $data = $request->getParsedBody();
                // $name = $data['name'];
        // Insira o código para salvar a categoria no banco de dados aqui
        return $response->withHeader('Content-Type', 'application/json')->withStatus(200);;
        }
    }