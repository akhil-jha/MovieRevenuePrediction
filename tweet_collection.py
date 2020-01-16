import GetOldTweets3 as got
from vaderSentiment.vaderSentiment import SentimentIntensityAnalyzer
movies=[("#AStarisBorn", "2018-10-12", "2018-10-5"),
("#Incredibles", "2018-06-05", "2018-05-29"),
("#ReadyPlayerOne", "2018-03-28", "2018-03-21"),
("#AntmanandtheWasp", "2018-07-04", "2018-05-27"),
("#BohemianRhapsody", "2018-10-24", "2018-09-17"),
("#Venom", "2018-10-05", "2018-09-28"),
("#JurrasicWorld2", "2018-06-08", "2018-06-01"),
("#BlacKkKlansman", "2018-08-10", "2018-08-03"),
("#TheMeg", "2018-08-10", "2018-08-03"),
("#theGrinch", "2018-11-9", "2018-11-2"),
("#GameNightMovie", "2018-02-23", "2018-02-16"),
("#CrazyRichAsians", "2018-08-15", "2018-08-08"),
("#TheNun", "2018-09-07", "2018-08-31"),
("#FantasticBeasts", "2018-11-16", "2018-11-09"),
("#MissionImpossible", "2018-7-27", "2018-07-20")
("#Interstellar","2014-11-05","2014-10-29"),
("#LucyMovie","2014-07-25","2014-07-18"),
("#NowYouSeeMe","2013-05-31","2013-05-24"),
("#AfterEarth","2013-05-31","2013-05-24"),
("#werethemillers","2013-08-07","2013-07-31"),
("#Bumblebee","2018-12-21","2018-12-14"),
("#Dunkirk", "2017-07-21", "2017-07-14"),
25("#WarOfThePlanetOfTheApes", "2017-07-14", "2017-07-07"),
("#Wonderwoman", "2017-06-02", "2017-05-26"),
("#ThorRagnarok", "2017-11-03", "2017-10-27"),
("#Logan", "2017-03-03", "2017-02-24"),
("#JusticeLeague","2017-11-17","2017-11-10"),
("#AmericanMade","2017-09-29","2017-09-22"),
("#TheRevenant", "2015-12-25", "2015-12-18"),
("#RideAlong2", "2016-01-15", "2016-01-08"),
("#CentralIntelligence", "2016-06-17", "2016-06-10"),
("#SausagePartyMovie", "2016-08-12", "2016-08-05"),
("#TheMummy", "2017-06-09", "2017-06-02"),
("#BladeRunner2049","2017-10-06","2017-09-29"),
("#AQuietPlace", "2018-04-06", "2018-03-30"),
("#Gravity", "2013-10-04", "2013-09-27"),
("#SANANDREAS", "2015-05-29", "2015-05-22"),
("#xmenapocalypse", "2016-05-27", "2016-05-20"),
("#StraightOuttaCompton", "2015-08-14", "2015-08-07"),
("#Zootopia", "2016-03-04", "2018-10-12"),
("#KongSkullIsland", "2017-03-10", "2017-03-03"),
("#JUMANJI", "2017-12-20", "2017-12-13"),
("#TheLastJedi", "2017-12-15", "2017-12-08"),
("#Kingsman", "2017-09-22", "2017-09-15"),
("#AtomicBlonde", "2017-07-28", "2017-07-21"),
26("#BeautyAndTheBeast", "2017-03-17", "2017-03-10")]
analyser = SentimentIntensityAnalyzer()
def print_sentiment_scores(sentence):
    snt = analyser.polarity_scores(sentence)
    return (snt['compound'])
for movie in movies:
    f = open(movie[0] + ".txt", "a", encoding="utf-8")
    tweetCriteria = got.manager.TweetCriteria().setQuerySearch(movie[0]).setSince(movie[2]).setUntil(movie[1])
    tweet = got.manager.TweetManager.getTweets(tweetCriteria)
    count = 0
    rcount = 0
    total_sentiment = 0.0
    for i in tweet:
        count = count + 1
        rcount = rcount + 1 + i.retweets
        n = float(print_sentiment_scores(i.text))
        total_sentiment = total_sentiment + n * float(i.retweets)
        a = i.text + "]\n"
        print(a)
        f.write(a)
final_data = open("final_data.txt", "a")
final_data.write(movie[0] + "," + movie[1] + "," + movie[2] + "," +
str(total_sentiment / rcount) + "," + str(rcount) + "\n")
final_data.close()
f.write("\n" + str(count))
f.close()