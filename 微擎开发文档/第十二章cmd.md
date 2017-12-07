共享上网.cmd
~~~
netsh wlan set hostednetwork mode=allow
netsh wlan set hostednetwork ssid=cmcc key=12345678
netsh wlan start hostednetwork
pause
~~~
修复网络.cmd
~~~
netsh winsock reset pause
~~~
右键记事本打开.reg
~~~

Windows Registry Editor Version 5.00

[HKEY_CLASSES_ROOT*\shell\Notepad2]
@="Notepad2"
[HKEY_CLASSES_ROOT*\shell\Notepad2\command]
@="Notepad.exe %1"
~~~