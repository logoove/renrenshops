安装TortoiseGit和中文语言包 
PuTTY生成ssh key 主要生成过程移动鼠标更快
把生成的私密保存成ppk类型文件,复制sshkey绑定到github.com

安装windows for github
bash下操作
~~~
git clone https://github.com/logoove/logoove.github.com.git 复制到本地 git remote add origin git@github.com:logoove/weui2.git
~~~
登录
~~~
git push -u origin master
~~~

ssh-keygen -t rsa -C "logove@qq.com" 建立本地ssh key 然后查看.pub文件复制里面所有内容到github主页进入Account Settings，左边选择SSH Keys，Add SSH Key,title随便填，粘贴key。 接着输入ssh -T git@github.com
~~~
git config --global user.name "logoove"
git config --global user.email "logove@qq.com"
~~~
修改远程地址
~~~
git remote add origin git@github.com:logoove/logoove.github.com.git 
~~~

添加注释 git add ./ -a 记录删除或修改 git commit -m "first commit"

git push origin master 上传 

git pull origin master 更新

192.30.252.130 github.com 添加到hosts

Pages只需要创建分支gh-pages