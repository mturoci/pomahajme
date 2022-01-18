Open sourced code for https://pomahajme.sk/, a non-profit fundraising site for disabled children. PRs welcome!

## Dev setup

```sh
git clone https://github.com/MartinTuroci/pomahajme
docker-compose up
```
### Access db container

Password is `pass` (specified in `.env.local`).

```sh
d exec -it db mysql -u root -p
```

### Access php container

```sh
d exec -it app bash
```
