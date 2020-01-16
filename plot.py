import matplotlib.pyplot as plt
import numpy as np
import pandas as pd
from sklearn import linear_model
file = 'data.xlsx'
data = pd.ExcelFile(file)
print(data.sheet_names)
df = data.parse(0)
print(df)
print(df['Movie'])
x = df['Rank Number of Screens']
y = df['Rank Opening Weekend']
plt.scatter(x,y)
p = df['Rank of Number of Tweets']
q = df['Rank Opening Weekend']
plt.scatter(p,q)
plt.plot(np.unique(x), np.poly1d(np.polyfit(x, y, 1))(np.unique(x)))
x = df[['Number of Screens']]
y = df['Opening Weekend(in $)']
regr = linear_model.LinearRegression()
regr.fit(x,y)
print('Intercept: \n', regr.intercept_)
print('Coefficients: \n', regr.coef_)
new_x1 = 43126
new_x2 = 4242
z = regr.predict([[new_x2]])
print("New Movie: ")
print(z)

'''
Movie
Tweets
Opening Weekend(in $)
Number of Screens
Rank Opening Weekend
Rank Number of Screens
Rank of Number of Tweets