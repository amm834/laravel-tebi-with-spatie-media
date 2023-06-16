# AWS

## Public Access for Bucket

```json
{
    "Version": "2012-10-17",
    "Statement": [
        {
            "Sid": "PublicReadGetObject",
            "Effect": "Allow",
            "Principal": "*",
            "Action": "s3:GetObject",
            "Resource": "arn:aws:s3:::hello-public/*"
        }
    ]
}
```

# Tebi

## Public Access

```json
{
    "Version": "2012-10-17",
    "Id": "S3PolicyAllow-IP-UA",
    "Statement": [
        {
            "Sid": "IP-UA-Allow",
            "Effect": "Allow",
            "Action": ["s3:ListObjects"],
            "Resource": "*",
            "Condition": {
                "NoIpAddress": {
                    "aws:SourceIp": ["192.168.0.1"]
                },
                "StringEquals": {
                    "aws:UserAgent": ["curl/7.68.0"]
                }
            }
        }
    ]
}
```

## Public Access from browser ✅

```json
{
    "Version": "2012-10-17",
    "Id": "S3PolicyAllow-IP",
    "Statement": [
        {
            "Sid": "IP-Allow",
            "Effect": "Allow",
            "Action": ["s3:GetObject", "s3:HeadObject"],
            "Resource": "*",
            "Condition": {
                "IpAddress": {
                    "aws:SourceIp": [
                        "103.134.205.112",
                        "192.168.0.0/24",
                        "2001:4860:4860::8888"
                    ]
                },
                "NotIpAddress": {
                    "aws:SourceIp": ["192.168.0.98", "192.168.0.99"]
                }
            }
        }
    ]
}
```

`103.134.205.112` is current public ip of unilink.

## Allow all public (Tebi)

```json
{
    "Version": "2012-10-17",
    "Id": "S3PolicyAllow-IP",
    "Statement": [
        {
            "Sid": "IP-Allow",
            "Effect": "Allow",
            "Action": ["s3:GetObject", "s3:HeadObject"],
            "Resource": "*",
            "Condition": {
                "NotIpAddress": {
                    "aws:SourceIp": ["192.168.0.98", "192.168.0.99"]
                }
            }
        }
    ]
}
```
