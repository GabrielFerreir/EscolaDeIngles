<?php
    class noticiaController extends controller {
        
        
        public function index($link) {
                      $dados = array(
                'link' => $link
            );
            
            
            $noticia = new Noticias();
            $dados['noticia'] = $noticia->getNoticiaLink($link);
            
            $this->loadTemplate('noticia', $dados);
        }
        
//        public function ver($link) {
//            $dados = array(
//                'link' => $link
//            );
//            
//            
//            $noticia = new Noticias();
//            $dados['noticia'] = $noticia->getNoticiaLink($link);
//            
//            $this->loadTemplate('noticia', $dados);
//        }
        
        
        
        public function categoria($categoria) {
            $dados = array();
            
            $noticias = new Noticias();
            
            $dados['noticias'] = $noticias->getNoticiaCategoria($categoria);
            
            $this->loadTemplate('categoria', $dados);
        }
        
        }
    