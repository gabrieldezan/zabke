INSERT INTO `informacoes_gerais` (`nome_empresa`, `titulo`, `descricao`, `whatsapp`, `celular1`, `celular2`, `email`, `email_contato`, `favicon`, `logo_principal`, `logo_secundaria`) VALUES
('Nome da Empresa', 'Titulo do Site', '', '', '', '', '', 'gdezan94@gmail.com', '', '', '');

INSERT INTO `missao_visao_valores` (`icone_missao`, `imagem_missao`, `texto_missao`, `icone_visao`, `imagem_visao`, `texto_visao`, `icone_valores`, `imagem_valores`, `texto_valores`) VALUES
('', '', '', '', '', '', '', '', '');

INSERT INTO `sobre` (`resumo_texto`, `texto`, `imagem`, `link`) VALUES
('', '', '', '');

INSERT INTO `usuarios` (`id_usuarios`, `nome`, `login`, `senha`, `imagem_perfil`, `status`) VALUES
(1, 'Web Dezan', 'webdezan', 'f1ccbb92591d22f719a88c5be8b1161a', 'perfil-web-dezan.jpg', 1);

INSERT INTO `tamanho_imagens` (`id_tamanho_imagens`, `tabela`, `campo`, `largura`, `altura`) VALUES
(1, 'banner', '#inputImagem', '1094', '115'),
(2, 'sobre', '#inputImagem', '500', '500'),
(3, 'missao_visao_valores', '#inputImagemMissao, #inputImagemVisao, #inputImagemValores', '100', '100'),
(4, 'equipe', '#inputImagem', '120', '60'),
(5, 'redes_sociais', '#inputImagem', '50', '50'),
(6, 'servicos', '#inputImagem', '500', '500'),
(7, 'clientes', '#inputImagem', '200', '200'),
(8, 'cases', '#inputImagem', '200', '200'),
(9, 'depoimentos', '#inputImagem', '100', '100'),
(10, 'galeria_imagem', '#inputImagem1, #inputImagem2, #inputImagem3, #inputImagem4, #inputImagem5', '500', '400'),
(11, 'vitrine_subgrupo', '#inputImagemCapa', '500', '500'),
(12, 'vitrine_produto', '#inputImagem, #inputImagem1, #inputImagem2, #inputImagem3, #inputImagem4, #inputImagem5', '500', '500'),
(13, 'eventos', '#inputImagem', '500', '500'),
(14, 'blog_postagem', '#inputImagem, #inputImagemGaleria', '800', '400'),
(15, 'informacoes_gerais', '#inputLogoPrincipal', '200', '100');