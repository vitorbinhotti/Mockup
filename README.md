## [ SA Parte IX ] Integração de Usuários e Estrutura de Sensores 


### Novas Funcionalidades Adicionadas

Recebeu  melhorias para a gestão de usuários, tornando o controle de funcionários mais prático e seguro. Confira as novidades:

---

### 1. **Listagem de Funcionários**
- Agora é possível visualizar todos os funcionários cadastrados em uma tabela organizada.
- A tabela exibe: ID, Nome, Email, CPF, Data de Nascimento, Cargo e opções de ação.

### 2. **Botão Editar**
- Cada funcionário possui um botão "Editar".
- Ao clicar, é possível alterar os dados do funcionário selecionado.

### 3. **Botão Excluir**
- Cada funcionário possui um botão "Excluir".
- Permite remover o funcionário do sistema.

### 4. **Adicionar Novo Funcionário**
- Há um botão para adicionar novos funcionários.
- O formulário de cadastro permite inserir todos os dados necessários

### 5. **Gestão de Cargos**
- No cadastro, é possível definir o cargo do usuário como **"funcionario"** ou **"adm"**.
- Apenas usuários com cargo **"adm"** têm acesso às funções administrativas (adicionar, editar e excluir funcionários).

---

Integração da API Abstract no Sistema SA
API Escolhida

Abstract API – serviço de validação de email (pode ser adaptado para outros serviços da Abstract, como detecção de rosto ou verificação de telefone).

A API foi escolhida para validar o campo de email no cadastro do Sistema SA, garantindo que os dados inseridos sejam corretos antes de salvar no banco.

Funcionalidades Implementadas

Front-end:
Ao digitar o email no formulário, a API é consultada automaticamente.
Exibe mensagens claras se o email for inválido ou temporário.

Back-end:
No create/update, valida novamente o email consultando a API.
Garante que apenas emails válidos sejam salvos no banco.

Tratamento de erros:
Email inválido, API fora do ar, timeouts, campos vazios.

Persistência:
Email validado é salvo no banco.

Registro de auditoria:
Timestamp da verificação e status (ok/erro) registrados no banco ou log da aplicação.
