var loc = window.location.pathname.match(/^\/?(\w+)\b/);
        if(loc) $(document.body).addClass(loc[1].toLowerCase());