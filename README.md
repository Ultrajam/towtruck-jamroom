ujTowTruck Module for Jamroom 5
================

Brings Mozilla TowTruck collaborative features to Jamroom 5.

v0.9.0-beta tested on Jamroom 5 beta 9

#Installation
Upload the module and enable it.

You can then allow it for any quota, but you would probably prefer to enter specific user ids (as a comma separated list of numbers) in TowTruck's config in the Admin Control Panel (and then remove them once you are done). Don't forget to include your own quota id if you are going to be taking part in the collaboration.

Place the smarty function in a template used in all pages such as footer.tpl

Visit your site and click the TowTruck button.

Invite your collaborators by sharing the TowTruck link.

Wait for your friend to join.

You'll see a notification when your friend joins your session, and you can then collaborate in real-time.

Read more about TowTruck here: https://towtruck.mozillalabs.com/

#Browser Support 

TowTruck is intended for relatively newer browsers which have WebSocket support. Mozilla recommend Firefox (nightly for webRTC support) or Chrome.

They say this regarding IE:
With IE 10 it is possible to support Internet Explorer (version 9 and before do not support WebSockets). However we do not test at all regularly on Internet Explorer, and we know we have active issues but are not trying to fix them. 
