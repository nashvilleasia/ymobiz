[Back](/docs)

Installation Ymocard Project
===============================

Making Checkout Project from SVN
--------------------------------

Using Tortoise
--------------

Checking Out A Working Copy
To obtain a working copy you need to do a checkout from a repository.

Select a directory in windows explorer where you want to place your working copy. ***Right click*** to pop up the context menu and select the command ***TortoiseSVN*** → ***Checkout***

* Url Respositories:

        //Ymobiz
        http://ymobiz.ws/ymobizwssvn

        //Ymocard
        http://ymocard.ymobiz.ws/ymocardsvn

Type Url in field ***Url Respository***, enter ***Checkout Directory***, this very importante, because is your path from virtual host, so content in trunks\projet_name to your path\project_name in
your webserver, don't change any options, and click in ***OK***

After this, type your ***username*** and ***password*** for authentication SVN Project, and wait for checkout files from to your computer.

Ref Tortoise
------------

* [Tortoise Documentation Reference - Checking Out A Working Copy](http://tortoisesvn.net/docs/release/TortoiseSVN_en/tsvn-dug-checkout.html)

Using Command-Line Linux\Unix\Osx
---------------------------------

If you are participating in a development project that is using Subversion for version control, you will need to use Subversion to access and change project source files. You can browse the source code online to view a project's directory structure and files by clicking on the ***Subversion*** link in the left navigation pane for the project.

The ***Subversion*** page displays with three subdirectories: branches/, tags/, trunk/ and one README file. The README file gives a top level view of the Subversion repository. You can click ***Access options*** to view the Subversion client setup instructions. You must have a Subversion client installed on your local machine.

***Getting a local working copy for your project***: svn checkout

To get a "working copy" of the latest source files, you must check out the source files, a process which copies the files onto your system from the repository. In your shell or terminal client, type:

```
svn checkout https://(projectname).(domain)/svn/(projectname)/(DIR) (projectname) --username [type-user-name-here]
```

Enter your user password when prompted. This should be the same password associated with your user account on this site. Not specifying the directory will checkout the entire project source code. You may want to checkout the 'trunk/' directory as it has the working 'www/' folder.


* Works Example:

        //Ymobiz
        svn checkout http://ymobiz.ws/ymobizwssvn path --username [type-user-name-here]

        //Ymocard
        svn checkout http://ymocard.ymobiz.ws/ymocardsvn path --username [type-user-name-here]

Ref SVN
-------

* [SVN Documentation Reference - Using command-line Subversion to access project source files](http://www.tigris.org/nonav/scdocs/ddUsingSVN_command-line.html)
