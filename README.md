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

## Support

![JetBrains Logo (Main) logo](https://resources.jetbrains.com/storage/products/company/brand/logos/jb_beam.svg)
This project is supported
by [Jetbrains](https://www.jetbrains.com/community/opensource/?utm_campaign=opensource&utm_content=approved&utm_medium=email&utm_source=newsletter&utm_term=jblogo#support)
by generously providing OS licenses to their products.
