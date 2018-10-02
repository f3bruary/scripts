# Things to do when deploying a new server

## Update
```
apt-get update
apt-get upgrade
apt-get dist-upgrade
reboot
```

## Install Musthaves
```
apt-get install vim tmux zsh host whoami htop sudo git ufw
```

## User Management
```
adduser f3bruary
usermod -aG sudo f3bruary
#echo "%sudo   ALL=(ALL:ALL) ALL" > /etc/sudoers
```

## Firewall
```
sudo ufw disable
sudo ufw default deny incoming
sudo ufw default allow outgoing
sudo ufw allow ssh
#sudo ufw allow port/tcp
#sudo ufw allow from 0.0.0.0
#sudo ufw allow from 0.0.0.0/24 to any port 22
sudo ufw enable
```

## SSH Hardening

> /etc/ssh/sshd_conf
```
#Port xxxx
Protocol 2
PermitRootLogin no
PubkeyAuthentication yes
PasswordAuthentication no
PermitEmptyPasswords no
X11Forwarding no
AllowUsers f3bruary
```
