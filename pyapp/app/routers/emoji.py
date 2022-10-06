import json
import re

from fastapi import APIRouter, Query

from ..schemas.emoji import Emoji
from ..config import settings

router = APIRouter(
    prefix=settings.BASE_PATH + "/emoji",
    tags=["emoji"],
    responses={404: {"description": "Not found"}},
)


def score(string: str):
    return (-len(re.findall(r"[ぁ-ん]", string)), len(string))


@router.get("/", response_model=Emoji)
def to_emoji(
    q: str = Query(min_length=1, max_length=64, regex=r"^[ぁ-んー\s]+$"),
):
    data = json.load(open("static/emoji/hira_to_emoji.json"))

    dp = [""] * (len(q) + 1)
    for i in range(1, len(q) + 1):
        dp[i] = dp[i - 1] + q[i - 1]
        for j in range(i):
            if q[j:i] in data:
                tmp = dp[j] + data[q[j:i]]
                if score(tmp) > score(dp[i]):
                    dp[i] = tmp

    return Emoji(input=q, output=dp[-1])
