var ActionScriptVM = function(model)
{
	var self = this;
	
	self.Name = ko.observable(model.ServiceName);
	self.Code = ko.observable(model.ServiceStatus)
	self.Args = ko.observable(model.ServiceDesc);
	self.User = ko.observable(model.ServiceDesc);
		
	
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
