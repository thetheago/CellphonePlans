

# Objetivo
O objetivo deste teste é construir uma solução responsável por exibir preço dos planos vendidos junto aos aparelhos de telefone e a sua principal característica é a possibilidade de associar vários planos a um telefone e diferentes localidades do país.

# Critérios de aceitação

O candidato deverá escrever um programa que receberá uma lista de planos(data.json) e deverá retornar a lista filtrada baseada nos critérios abaixo:

- O sistema só poderá exibir planos que tenham schedule.startDate válidos, ou seja, menor que a data atual.
- O sistema só poderá exibir 1 única vez planos que tenham os mesmos : name, localidade dando preferência quem possuir o schedule.startDate mais recente.
- Note que o campo localidade possui uma hierarquia (PAÍS -> ESTADO -> CIDADE). Esta hierarquia deverá ser respeitada, de maneira que a cidade terá maior prioridade que estado e  país. O sistema só poderá exibir 1 única vez planos que tenham os mesmos : name  dando preferência a hierarquia de localidades.


# Critérios de avaliação



*   **Funcionalidade**: atender todos os critérios de aceitação mencionados;
*   **Organização do projeto**: diretórios, arquivos, classes, etc ...;
*   **Legibilidade do código**;
*   Adoção de boas práticas de desenvolvimento de software;
*   **Criatividade**: O escopo deste teste é bem aberto, do ponto de vista de requisitos técnicos, propositalmente, para que você possa demonstrar sua criatividade e propor a melhor solução que atenda a soliictação dentro do prazo disponibilizado :)
*   **Propor melhorias  no arquivo JSON disponibilizado.**


![imagem](img.png "imagem")



# O que é e o que não é permitido


- <span style="color:green">É permitido</span> Pesquisar no Google;
- <span style="color:green">É permitido</span> perguntar sobre as regras de negócio para o entrevistador;
- <span style="color:red">Não é permitido</span> utilizar bibliotecas de terceiros. Ex.: lodash, jquery, angular, laravel, etc. Queremos ver a sua capacidade de resolver um problema de lógica de programação.
- <span style="color:red">Não é permitido</span> fazer perguntas técnicas para o entrevistador.
- <span style="color:orange">Não é necessário</span> criar o layout da aplicação no exemplo. O importante para a avaliação é conseguir realizar o filtro proposto. Se for possível fazer o layout durante o tempo do teste será um diferencial.


