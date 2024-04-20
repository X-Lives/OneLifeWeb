# OneLifeWeb 的服务器设置

## 基本设置

~~$5/month [DigitalOcean](https://m.do.co/c/930cfa370b47) droplet will do the trick.~~

测试时，我使用根(root)用户，但最佳实践设置请参见 [initial server setup](https://www.digitalocean.com/community/tutorials/initial-server-setup-with-ubuntu-20-04).

## 主要设置
运行 [setup.sh](https://github.com/X-Lives/OneLifeWeb/blob/zh_cn/setup.sh)

要么将此目录克隆到主目录并运行脚本，要么将脚本复制到主目录下的一个新文件中。

## config.php
配置所需详细信息

- 数据库地址 (db.twohoursonelife.com)
- 数据库名称 (名称)
- 数据库用户名 (用户名)
- 数据库密码 (密码)
- 共享游戏服务器秘密 (字符串)
- 密码（40 个字符 [a-zA-Z0-9])
- 访问密码（最多 20 个字符）
- 访问密码哈希值（配置密码哈希值后使用 ticketServer/passwordHashUtility.php）
- 共享加密密文（40 个字符 [a-zA-Z0-9])

## 进一步配置
- 可能需要将现有服务器上的下载和补丁复制到新服务器上。这些内容应保存在 `OneLifeWeb/data/diffDownloads` 中。
- 在 `OneLifeWeb/data/diffDownloads/requiredVersion.php` 中输入当前游戏版本


