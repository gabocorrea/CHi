1) Double click the file start-server-Windows
2) Open Chi file
3) Done!

4) If previous steps didn't work, run step 1 and then go to localhost:8080 in a browser (at least Chrome works). Note: change 8080 to your port number if you modified it.



Start Using CHi:
1) Press the button in New Project section.
2) Select a folder with your Java source files (also works with subfolders inside the given folder)
3) Wait (if there are many files)
4) Done! You should be able to visualize and highlight comments


_______________________
------------------
How to Change port:

1) Edit the file start-server-Windows
2) Change the variable path to another port number


Troubleshoot
If an error apears when running the file start-server-Windows, you might need to copy a file called msvcr110.dll to your C:\Windows\System32. You can find it in src/external-libraries/msvcr110.dll. If it doesn't work, then download the correct file for your windows version at http://fix4dll.com/msvcr110_dll.

If nothing happens when you create a new project (uploading a folder), check the folder "projects-Comments". If this folder is empty, then there is a problem with the script slocc.sh (whick uses awk to extract comments)