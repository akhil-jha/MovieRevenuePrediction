import os
from textblob import TextBlob
l = os.listdir("sentiment")
print("Files for Sentiment compound calculation:")
print(l)
for file_name in l:
    try:
        name="sentiment/"+file_name
        file = open(name, "r", encoding="utf-8")
        file_sentiment= open("sentiment_score.txt","a")
        tweets = file.readlines()
        score=0
        for tweet in tweets:
        tweet_sent = TextBlob(tweet[:-1])
        score = score + tweet_sent.sentiment.polarity
        tweet_count=int(tweets[len(tweets)-1])
        avg_sentiment=score/tweet_count
        print("Movie: "+file_name[1:-4])
        print(score/int(tweets[len(tweets)-1]))
        file_sentiment.write(file_name[:-4]+ " , " + str(tweet_count) + " , "\+ str(avg_sentiment) + "\n")
except:
    continue
    file_sentiment.close()
print("Sentiment compound calculation ")