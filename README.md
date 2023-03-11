# mpd_drm_to_m3u8
MPD with drm to M3U8 basic setup<br>

MPD with clearkey to M3U8 restreaming ussing some tools and ffmpeg<br>
Working Only on windows, if you need linux, deploy it and put the  N_m3u8DL-RE fiel in bin<br>

![image](https://user-images.githubusercontent.com/10226983/224454083-19e7208d-78fb-40ba-9b33-36db2aad5674.png)

Check structure folder<br>

TODO: because N_m3u8DL-RE don't support pipe for now we need to send the TS file to ffmpeg and send it to M3U8 or you can edit runffmpeg.php to edit with your desire command

Support Clearkey with and without atob<br>

Support Security and user login<br>

TODO:<br>

User Registration <br>
User scalation admin - user<br>
Delete Stream<br>
Update Stream<br>
Auto restart stream<br>
Clean TMP and TS files in auto mode<br>
Do react front-end and implement API<br>
