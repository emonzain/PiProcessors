var ActionScriptVM = function(model)
{
	var self = this;
	
	self.Name = ko.observable(model.ServiceName);
	self.Code = ko.observable(model.ServiceStatus)
	self.Args = ko.observable(model.ServiceDesc);
	self.User = ko.observable(model.ServiceDesc);
		
	
	self.Waiting = ko.observable(false);
	
	self.Timer = null;
	
	
	self.Refresh = function()
	{
		self.Waiting(true);
	}
	
	self.EndRefresh = function()
	{
		self.Waiting(false);
		
		if(self.Timer != null)
		{
			clearTimeout(self.Timer);
		}
		
		self.Timer = setTimeout(self.Refresh, 50000);		
	}
	
	
	self.RunAction = function()
	{
		if(!self.IsRunning())
		{
			$.ajax({
			    method: 'GET',
			    dataType: "json",
			    url: "/actionscript/" + self.Code() + "/" + self.Args(),
			    contentType: "application/json",
			    beforeSend: function () {
					self.Waiting(true);		
			    },
			    complete: function () {
				    self.EndRefresh();
			    },
			    success:
					function (allData) {
					self.IsRunning(true);
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
