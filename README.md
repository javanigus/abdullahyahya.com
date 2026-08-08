# abdullahyahya.com
This is my custom child theme for abdullahyahya.com. It is based on Wordpress twentyfifteen theme.
https://wordpress.org/themes/twentyfifteen/

## Deployment

Hosted on Hostinger. Both environments deploy this theme from this repo, but differently.

### Production (abdullahyahya.com)

Push to `main`. Hostinger's GIT integration (hPanel → Advanced → GIT) auto-deploys on every
push to `wp-content/themes/mytwentyfifteen`.

### Staging (staging.abdullahyahya.com)

Push to `staging`. Hostinger's managed WordPress Staging tool has no GIT integration of its
own, so the staging theme folder has to be pulled manually over SSH:

```bash
ssh -i ~/.ssh/id_ed25519_hostinger -p <PORT> <USERNAME>@<HOST>
cd domains/abdullahyahya.com/public_html/staging/wp-content/themes/mytwentyfifteen
git pull
```

The staging WordPress install has its own database and its own `siteurl`/`home` options
(both `https://staging.abdullahyahya.com`), isolated from production. If the staging
environment is ever recreated via hPanel, re-check both of these — Hostinger's clone process
rewrites them automatically, but only if the staging subdomain's DNS already resolves at
clone time; if it doesn't, the rewrite silently fails and staging ends up pointing at
production's database.

### Gotchas (not tracked in this repo, but affect deploys)

- `wp-config.php` has two DB_NAME/DB_USER/DB_PASSWORD blocks left over from the original
  GoDaddy migration — an old one near the top, and Hostinger's staging-specific one appended
  near the bottom. PHP's `define()` keeps the first value, so the top block silently wins
  unless it's removed. Relevant only to the staging copy of this file.
- `gd-config.php` (a leftover GoDaddy config file, not part of this theme) is `require`'d by
  `wp-config.php` and must exist alongside it or WordPress fatals. It only holds account
  metadata, not credentials, so it's harmless to copy as-is.
- Theme files use root-relative URLs (`/wp-content/uploads/...`), not absolute
  `https://abdullahyahya.com/...` ones, specifically so the same code works unmodified on
  both staging and production.
