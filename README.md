# "REST" API Simples em PHP

A API funciona somente com metodos GET e POST, o metodo GET implementa as ações de
'SELECT' e 'DELETE', já o metodo POST implementa as ações de `INSERT` e 'UPDATE'


## Consulta SELECT via GET

Para execultar o seguinte comando no banco de dados :
```sql
SELECT * from tblProdutos;
```

Bastaria montar uma URL da seguinte maneira

http://localhost/api.php?acao=SELECT&tabela=tblProdutos

Veja que eu passo a `acao` de SELECT e o nome da `tabela` como tblProdutos, você pode
fazer o select em qualquer tabela do seu banco de dados.


É possivel passar parâmetros de `where` :

http://localhost/api.php?acao=SELECT&tabela=tblProdutos&where=idProduto=10

Essa chamada execultaria o seguinte sql no banco:

```sql
SELECT * from tblProdutos where idProduto=10;
```


Posso também passar mais de uma condição no `where`:

http://localhost/api.php?acao=SELECT&tabela=tblProdutos&where=preco>10 and nome='mouse'

Que resultaria no seguinte sql:

```sql
SELECT * from tblProdutos where preco > 10 and nome = 'mouse';
```

## DELETE via GET

Para deletar todos os registros de uma tabela preciso passar a acao de DELETE e o nome da tabela:

http://localhost/api.php?acao=DELETE&tabela=tblProdutos

Sql gerado :
```sql
DELETE from tblProdutos;
```


Para deletar um registro da tabela de forma condicional, preciso passar alem da ação de DELETE e o nome da table a condição where:

http://localhost/api.php?acao=DELETE&tabela=tblProdutos&where=idProduto=10

Sql gerado :
```sql
DELETE from tblProdutos where idProduto=10;
```


# Chamadas POST
