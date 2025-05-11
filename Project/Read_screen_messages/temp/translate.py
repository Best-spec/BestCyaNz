import requests

url = "http://localhost:8000/translate"
text = "All releases After downloading a binary release suitable for your system, please follow the installation instructions. If you are building from source, follow the source installation instructions. See the release history for more information about Go releases. As of Go 1.13, the go command by default downloads and authenticates modules using the Go module mirror and Go checksum database run by Google. See https://proxy.golang.org/privacy for privacy information about these services and the go command documentation for configuration details including how to disable the use of these servers or use different ones."
data = {"text": text, "to": "th"}

response = requests.post(url, json=data)
print(response.json()) 
