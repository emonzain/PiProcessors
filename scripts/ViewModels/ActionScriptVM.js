var ActionScriptVM = function(model)
{
	var self = this;
	
	self.Name = ko.observable(model.ActionName);
	self.Code = ko.observable(model.ActionCode)
	self.Args = ko.observable(model.ActionArgs);
	self.User = ko.observable(model.ActionUser);
	self.Target = ko.observable(model.ActionTarget);
	
	self.Waiting = ko.observable(false);
		
	
	self.Refresh = function()
	{
		self.Waiting(true);
	}
	
	self.EndRefresh = function()
	{
		self.Waiting(false);
	}
	
	
	self.RunAction = function()
	{
		if(!self.Waiting())
		{
			$targetUrl = "";
			
			if(self.Target() != undefined && self.Target() != null && self.Target().length > 0)
				$targetUrl = "/" + self.Target() + "/";
			
			$targetUrl = $targetUrl + "/actionscript/" + self.Code() + "/" + self.Args();
			
			$.ajax({
			    method: 'GET',
			    dataType: "json",
			    url: $targetUrl,
			    contentType: "application/json",
			    beforeSend: function () {
					self.Waiting(true);		
			    },
			    complete: function () {
				    self.EndRefresh();
			    },
			    success:
					function (allData) {
				},
			    error: function (XMLHttpRequest, textStatus, errorThrown) {
					alert("Erreur");
					//self.actionEnCoursDocuments(false);
			    }
			});
		}		
	}
	
	
	
	self.EndRefresh();
}
