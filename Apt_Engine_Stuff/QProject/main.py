#!/usr/bin/env python
#
# Copyright 2007 Google Inc.
#
# Licensed under the Apache License, Version 2.0 (the "License");
# you may not use this file except in compliance with the License.
# You may obtain a copy of the License at
#
#     http://www.apache.org/licenses/LICENSE-2.0
#
# Unless required by applicable law or agreed to in writing, software
# distributed under the License is distributed on an "AS IS" BASIS,
# WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
# See the License for the specific language governing permissions and
# limitations under the License.
#


import webapp2
import jinja2
import os

jinjaEnvironment = jinja2.Environment(autoescape = True,
    		loader = jinja2.FileSystemLoader(os.path.join(os.path.dirname(__file__),'views')))



class MainHandler(webapp2.RequestHandler):

    def get(self):
    	title = "QProject"
    	templateVars = {
    		'title': title
    	}
        template = jinjaEnvironment.get_template('index.html')
        self.response.write(template.render(templateVars))

class InfoHandler(webapp2.RequestHandler):

    def get(self):
        template = jinjaEnvironment.get_template('info.html')
        self.response.write(template.render())




app = webapp2.WSGIApplication([
    ('/', MainHandler),
    ('/info.html', InfoHandler)
], debug=True)
