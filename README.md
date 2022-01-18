### Access db container

Password is `pass` (specified in `.env.local`).

```sh
d exec -it db mysql -u root -p
```

### Access php container

```sh
d exec -it app bash
```
