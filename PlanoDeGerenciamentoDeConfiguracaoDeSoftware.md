# Plano de Gerência de Configuração de Software #


## Sistema de Controle de Custos ##
> Cliente: Weslei A. de T. Marinho

# SYSCO #

Versão: 0.01 | 11/09/2007

Responsáveis: Valéria A. A. Barbosa




|               Histórico de Alterações                    |
|:---------------------------------------------------------|
| Data                                                     | Versão                                                   | Descrição                                                | Autor                                                    |
| 11/09/2007                                               | 0.01                                                     | Criação Inicial                                          | Valéria Barbosa                                          |




|          Lista de Aprovadores         |
|:--------------------------------------|
|    Nome                               | Cargo                                 |
| Valéria Barbosa                       | Gerente de Projeto                    |




## 1 Introdução ##

> O Plano de Gerenciamento de Configuração estabelece e mantem a integridade de códigos-fonte e demais produtos do SYSCO, permitindo o acompanhamento destes itens durante todo o ciclo de vida do projeto, e preservando o histórico de evolução dos sistema. Auxiliando a  gerenciar o estado dos itens de configuração dos sistemas, controlar as mudanças em itens de configuração e rastrear modificações nos itens de configuração ao longo do tempo.

### 1.1 Propósito ###
> Este documento descreve a organização, nomenclatura e regras para o versionamento do projeto SYSCO.

### 1.2 Escopo ###
> Este documento descreve toda a infra-estrutura utilizada durante o desenvolvimento do projeto SYSCO.

### 1.3 Convenções, termos e abreviações ###
> Esta seção explica o conceito de alguns termos importantes que serão mencionados no decorrer deste documento. Estes termos são descritos na tabela a seguir, estando apresentados por ordem alfabética.

|    Termo |  Descrição |
|:---------|:-----------|
| Baseline | Conjunto de artefatos que recebe uma aprovação de estabilidade. Um baseline é usado como uma base no desenvolvimento das próximas fases dos artefatos e tem suas modificações controladas por um processo. |
| CR       | Solicitação de Mudança (Change Request) |
| CVS      | Sistema de Controle de Versão (Control Version System) |
| SCMP     | Plano de Gerência de Configuração de Software (Software Configuration Management Plan) |
| Core Team |            |




### 1.4 Referências ###



## 2 Organização ##

### 2.1 Identificação de Documentos ###

> Todos dos itens de configuração, com exceção do código fonte, devem ser identificados baseados na nomenclatura descrita a seguir:


&lt;PROJETO&gt;



<ID\_ARTEFATO>



&lt;DATA&gt;


em que:


&lt;PROJETO&gt;

 é o nome do projeto;


<ID\_ARTEFATO>

 é a identificação do artefato;


&lt;DATA&gt;

 é a data de criação do artefato, ou seja, a data da primeira versão do artefato em questão. Para descrição da data o formato AAAAMMDD deve ser utilizado.
> Por exemplo: SYSCO\_SCM\_20070901
> É importante salientar que todas as letras dos nomes que compõem os documentos devem estar em caixa alta.

A apresenta os artefatos que podem ser gerados no processo e suas respectivas identificações.

| Artefato | Identificação |
|:---------|:--------------|
| Casos de Uso | UC            |
| Documento de Arquitetura | ARC           |
| Documento de Requisitos | REQ           |
| Plano de Gerência de Configuração | SCM           |
| Plano de Teste de Software | STP           |
| Status Report | ST            |
| Relatório de Testes | TSR           |
| Story Board (documento de telas) | STB           |


### 2.2 Versão dos Documentos ###

> O padrão de versionamento dos artefatos  (exceto código e relatórios) devem ter um número de versão segundo o padrão descrito a seguir:
> > XX.YY
onde:

> X é um número decimal que representa uma versão final do artefato;
> YY é um número hexadecimal que representa um draft da versão X do artefato.
> O número de versão dos artefatos muda de acordo com as regras descritas:
A primeira versão do artefato deve ser 0.01;
A cada modificação no artefato, o valor YY deve ser incrementado;
Após cada aprovação do artefato, a versão X deve ser incrementada de uma unidade e o valor YY retorna para 00, sendo assim gerada uma nova versão oficial;
> Para que a versão de um artefato seja modificada é necessária a aprovação do moderador. É considerada uma aprovação do documento a aprovação do documento após uma revisão e aprovação por pelo menos dois membros do core group responsável pelo artefato respectivo.

### 2.3 Localização de Artefatos ###

> A organização hierárquica do local onde serão armazenados os produtos do projeto, incluindo uma breve descrição do conteúdo de cada item da estrutura  (pasta).
;
;
;
;


### 2.3 Baselines do Projeto ###

> As baselines geradas para o projeto:
| Baseline | Descrição | Padrão |
|:---------|:----------|:-------|
| Requisitos | Marcado assim que for concluída análise de requisitos da iteração. | SYSCO\_REQ_<interaçao>_|
| Análise e Projeto | Marcado quando forem concluídos a análise e o projeto de cada iteraçao | SYSCO\_ARCH_<iteraçao>_|
| Build    | Criada a cada build para o software | SYSCO\_BUILD

&lt;build&gt;

 |
| Release  | Criado a cada release do software | SYSCO\_RELEASE_<versão>_|
| Documentos | Criado após a aprovação de um documento. | ????   |


<iteração> é o número da iteração, sendo utilizados para identificação dois dígitos começando em 01 e sendo incrementado de uma unidade a cada nova iteração.


&lt;build&gt;

 é o número da build, sendo utilizados para a identificação três dígitos começando em 001 e sendo incrementado de uma unidade a cada nova build.
<versão> é o número da versão lançada.


## 3 Controle de Configuração ##

### 3.1 Procedimentos de Mudança ###

> As mudanças nos itens de configuração do projeto devem estar sempre associadas a uma ou mais solicitações de mudanças. Dessa forma, para toda e qualquer modificação nos itens de configuração, um CR deve ser aberta conforme descrito.

### 3.1.1 Política de uso de branches ###

> As solicitações de mudanças devem ser criadas através da ferramenta de issues disponível no site do projeto http://code.google.com/p/conexao/. Para tanto o usuário deve estar logado como administrador. O preenchimento dos campos deve ser feito seguindo as orientações descritas a seguir. Devem ser aprovadas pelo core team responsável pelo artefato em questão.

|     Campo    |      Valor |
|:-------------|:-----------|
| Summary      | Breve descrição do problema |
| Description  | Descrição detalhada do problema |
| Status       || Open Statuses:|
New- A issue ainda não teve sua revisão inicial
Accepted – problema reproduzido/precisa reconhecimento.
Started – o trabalho nesta issue começou
Closed Statuses:
Fixed – Desenvolvedor fez as mudanças pedidas, QA deve verificar.
Verified – QA verificou que o reparo foi trabalhado
Invalid – relatório não válido
Duplicate – este relatório duplica uma issue existente
WonFix – foi decidido não examinar esta issue 
| Owner        | Responsável pela CR. |
| Cc           | Lista de destinatários de cópias de e-mails relativos a essa mudança. |
| Labels       || Permite que sejam selecionados o tipo e a prioridade  da issue, o sistema operacional...|
Type-Defect – Relato de um defeito no artefato a ser mudado.
Type-Enhancement – Requerimento para melhoria no artefato.
Type-Task – os artigos trabalhados não requerem mudança no código ou nos docs.
Type-Pach – Correção do código fonte para revisão
Type-Other – Algum outro tipo de issue
Priority-Hign – Prioridade alta para a resolução do evento especificado.
Priority-Medium – Prioridade média para a resolução do evento especificado.
Priority-Low – Prioridade baixa para a resolução do evento especificado.
OpSys-All – Todos os Sistemas Operacionais
OpSys-Windows – Sistema Operacional Windows
OpSys-Linux – Sistema Operacional Linux
OpSys-OSX – Sistemas Operacional OSX
Milestone-Release1.0 -
Component-UI – issue relaciona-se ao programa UI
Component-Logic – issue relaciona-se a lógica da aplicação.
Component-Persistence – issue relaciona-se ao componente de armazenamento de dados.
Component-Scripts – roteiro de utilização e instalação
Componet-Docs – issue relacionada a documentação do usuário final.
Security – segurança de risco dos usuários
Performance – issue de desenpenho
Usability – efeitos da usabilidade do programa
Maintainability – impedir mudanças futuras. 

### 3.1.2 Ciclo de Vida das solicitações de mudança ###

> Os possíveis estados, as possíveis soluções e o ciclo de vida de uma solicitação de mudanças. A seguir são descreve os estados possíveis para uma solicitação de mudanças.

## 4 Auditoria de Configuração ##

> As auditorias de configuração devem ser realizadas para cada ciclo do processo de desenvolvimento de forma a garantir que o processo de gerência de configuração estão sendo aplicados corretamente. Os artefatos gerados devem armazenados no repositório do projeto e devem ser acompanhados pelos Gerentes do Projeto.
Plano de Contingência
> Uma vez por semana será feito um backup da versão mais recente dos artefatos que se encontram no CVS na máquina de dois membros da fábrica participantes do projeto.

## 5 Ferramentas ##

> Segue abaixo uma lista das ferramentas utilizadas no processo de desenvolvimento do projeto SYSCO.
|    Ferramenta   |   Descrição   |
|:----------------|:--------------|
| Code.google.com.br | Ambiente para promoção de código livre, interação com desenvolvedores e gerenciamento de projetos. |
| GantrProject    | Para a Gerência do Projeto |
| GoogleGroups    | Comunicação da equipe |
| MSN Live Messenger | Ferramenta de Comunicação |
| MySQL 4.1       | SGDB a ser utilizado. |
| Skype 3.5       | Ferramenta de Comunicação |
| TortoiseSVN 1.4.5 | Ferramenta para Gerência de Configuração (Subversion) |
| VertrigoServ    | Ambiente de desenvolvimento  Web |