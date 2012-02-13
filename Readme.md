__Change the status of CartThrob entries after purchase confirmation__

In CartThrob you can sell anything you like but there seems to be one thing missing, entries themselves!!

So, this is a simple extension that uses the CartThrob "cartthrob\_on\_authorize" hook to see when an entry has been paid for, and sets the Status of that entry to open.

So, you would create an entry, set it's status to something other than open, and then when that entry has been paid for, this extension sets the status to "Open".

If you're asking yourself "What scenario would you use this in?", well, imagine if you have a site like Craigslist or Gumtree and you want to charge people for posting a listing on your site. Well, you would setup a channel whose default status for new entries was "closed". Then you would setup a SAEF form to allow submitting to that channel from the front end. When someone creates an entry into that channel, they are set as the author, and the entry has a status of closed. You would then let them add any closed status entries that they are the author of to their CartThrob shopping basket. Then when they have paid for their "products" (entries) this extension sets the Entry Status to "Open" and their listing is now live.

__TO DO__

A extension setting screen is needed to allow you to select which status the entry will be changed to instead of it being hardcoded to "Open". Not everyone uses the default status options after all...