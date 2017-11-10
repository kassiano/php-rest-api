# "REST" API Simples em PHP

A API funciona somente com metodos GET e POST, o metodo GET implementa as ações de
'SELECT' e 'DELETE', já o metodo POST implementa as ações de `INSERT` e 'UPDATE'

# Chamadas GET

## Consulta SELECT

```sql
SELECT * from tblProdutos;
```

http://localhost/api.php?acao=SELECT&tabela=tblProdutos

```sql
SELECT * from tblProdutos where idProduto=10;
```

http://localhost/api.php?acao=SELECT&tabela=tblProdutos&where=idProduto=10


```sql
SELECT * from tblProdutos where preco > 10 and nome = 'mouse';
```

http://localhost/api.php?acao=SELECT&tabela=tblProdutos&where=preco>10 and nome='mouse'



## DELETE

```sql
DELETE from tblProdutos;
```
http://localhost/api.php?acao=DELETE&tabela=tblProdutos


```sql
DELETE from tblProdutos where idProduto=10;
```
http://localhost/api.php?acao=DELETE&tabela=tblProdutos&where=idProduto=10


# Chamadas POST
