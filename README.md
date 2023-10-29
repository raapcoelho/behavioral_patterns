## Design Patterns - Padrões comportamentais

Este projeto tem como objetivo a aplicação prática dos padrões comportamentais em PHP.

### Strategy Pattern
- **Descrição**: O padrão Strategy permite definir uma família de algoritmos, encapsulando cada um deles e tornando-os intercambiáveis. Isso permite escolher o algoritmo a ser usado dinamicamente, com base nas necessidades do programa.
- **Utilização**: Insere os impostos necessários em cada produto.

### Chain of Responsibility Pattern
- **Descrição**: O padrão Chain of Responsibility é utilizado para criar uma cadeia de objetos que podem processar solicitações de forma sequencial. Cada objeto na cadeia decide se pode processar a solicitação ou deve passá-la para o próximo objeto na cadeia.
- **Utilização**: Calcula os descontos de acordo com os produtos.

### Template Method Pattern
- **Descrição**: O padrão Template Method define a estrutura de um algoritmo, permitindo que partes dele sejam implementadas por subclasses. Isso permite que as subclasses alterem o comportamento do algoritmo sem alterar sua estrutura.
- **Utilização**: Gera uma nota fiscal diferente de acordo com cada estado.

### State Pattern
- **Descrição**: O padrão State permite que um objeto altere seu comportamento quando seu estado interno muda. Isso é alcançado definindo classes de estado que representam os diferentes estados possíveis e permitindo a transição entre eles.
- **Utilização**: Gerencia o status do pedido.

### Command Pattern
- **Descrição**: O padrão Command encapsula uma solicitação como um objeto, permitindo parametrizar os clientes com solicitações, enfileirá-las, registrar seu histórico e fornecer funcionalidade de desfazer.
- **Utilização**: Realiza um novo pedido.
