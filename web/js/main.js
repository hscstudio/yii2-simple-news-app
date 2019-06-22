function loadAllNews(target){
    const ul = document.getElementById(target)
    const url = '/news/index';
    fetch(url)
    .then((resp) => resp.json())
    .then(function(data) {
        let news_list = data
        console.log(news_list)
        return news_list.map(function(news) {
            let li = document.createElement('li'),
                a = document.createElement('a'),
                h5 = document.createElement('h5'),
                small = document.createElement('small'),
                img = document.createElement('img'),
                p = document.createElement('p'),
                small2 = document.createElement('small');

            a.innerHTML = news.title
            a.href = '/site/detail?guid='+encodeURI(news.guid)
            h5.appendChild(a)
            li.appendChild(h5)

            let pubDate  = new Date(news.pubDate);
            small.innerHTML = news.author+' at '+pubDate.toLocaleString()+'<br>'
            li.appendChild(small)

            img.src = news.thumbnail;
            img.className = 'rounded img-fluid'
            li.appendChild(img)

            let content = news.content.replace(/(<([^>]+)>)/ig,"");
            p.innerHTML = content.substring(1,255) + '...'
            p.className = 'text-justify overflow-hidden'

            let categories  = news.categories;
            small2.innerHTML = '<br>Categories: ' + categories.join(', ')
            p.appendChild(small2)
            li.appendChild(p)
            ul.appendChild(li)
        })
    })
    .catch(function(error) {
        console.log(error);
    })
}

function loadNews(guid, target){
    const container = document.getElementById(target)
    const url = '/news/view?guid='+guid;
    fetch(url)
    .then((resp) => resp.json())
    .then(function(data) {
        let news = data
        console.log(news)
        
        let a = document.createElement('a'),
            h5 = document.createElement('h5'),
            small = document.createElement('small'),
            div = document.createElement('div'),
            small2 = document.createElement('small');

        a.innerHTML = news.title
        a.href = '/site/detail?guid='+encodeURI(news.guid)
        h5.appendChild(a)
        container.appendChild(h5)

        let pubDate  = new Date(news.pubDate);
        small.innerHTML = news.author+' at '+pubDate.toLocaleString()
        container.appendChild(small)

        div.innerHTML = news.content
        container.appendChild(div)

        let categories  = news.categories;
        small2.innerHTML = 'Categories: ' + categories.join(', ')
        container.appendChild(small2)
    })
    .catch(function(error) {
        console.log(error);
    })
}